<?php
class Bbs extends CI_Model{
    function getMain($data){
        $off=($data['page']-1)*20;
        $sql="SELECT id,title,reply,(SELECT `name` FROM bbs_user WHERE bbs_user.pid=main.pid) as `name`,".
        "(SELECT `tou` FROM bbs_user WHERE bbs_user.pid=main.pid) as `tou`,".
        "mid(`content`,1,20) as content".
        " FROM bbs_main main order by `time` DESC LIMIT $off,20";
        $res=$this->db->query($sql)->result_array();
        return array('data'=>$res,'page'=>ceil($this->db->query('SELECT count(*) AS num FROM bbs_main')->row()->num/20));
    }
    
    function addMain($data){
        if (isset($_FILES['file'])){
            $this->load->library('upload');
            $config['upload_path'] = 'upload/bbs/';
            $config['encrypt_name'] = true;
            $config['allowed_types'] = '*';
            $config['max_size'] = 50 * 1024 * 1024;//50MB
            //设置大小
            $this -> upload -> initialize($config);
            if (!$this -> upload -> do_upload("files")) {
                return $this -> upload -> display_errors();
            } else {
                $file = $this -> upload -> data();
                $data['append']=json_encode(array('n'=>$file['file_name'],'o'=>$file['orig_name'],'s'=>$file['file_size']));
            }
        }
        if ($this->db->insert('bbs_main',$data)) return true;
        else return 'Unknown';
    }

    function delMain($data){
        $res=$this->db->query("SELECT rank FROM bbs_user WHERE pid=$data[pid]")->row()->rank;
        if ($res==1){
            $res=$this->db->query("SELECT id FROM bbs_rep WHERE main=$data[id]")->row_array();
            if (count($res)==0) return '此帖不存在';
            $del=array();
            foreach($res as $item) $del[]=$item['id'];
            $this->db->where_in('rid',$del)->delete(array('bbs_zan','bbs_rep'));
            $this->db->query("DELETE FROM bbs_main WHERE id=$data[id]");
            return 'ok';
        }else return '你没有权限。';
    }
    
    function delRep($data){
        $res=$this->db->query("SELECT rank,main FROM bbs_user WHERE pid=$data[pid]")->row_array();
        if ($res['rank']==1){
            $this->db->simple_query("UPDATE bbs_main SET reply=reply-1 WHERE id=$res[main]");
            $this->db->where('rid',$data['rid'])->delete(array('bbs_zan','bbs_rep'));
            return 'ok';
        }else return '你没有权限。';
    }

    function getItem($id){
        $sql="SELECT (SELECT `name` FROM bbs_user WHERE bbs_user.pid=main.pid) as `name`,".
        "reply,title,content,time,append,readtimes FROM bbs_main main WHERE id=$id";
        $res=$this->db->query($sql);
        if ($res->num_rows()==1){
            $res=$res->row_array();
            if ($res['append']!=''){
                $res['append']=json_decode($res['append'],true);
            }else unset($res['append']);
            return $res;
        }else show_404();
    }
    
    function reply($data){
        if ($rep=$this->input->post('reply')) $res='<div class="reply">'.htmlspecialchars($rep,'ENT_NOQUOTES','UTF-8').'</div>';
        else $rep='';
        $data['content']=$rep.htmlspecialchars($data['content'],'ENT_NOQUOTES','UTF-8');
        $this->db->insert('bbs_rep',$data);
        $this->db->simple_query("UPDATE bbs_main SET reply=reply+1 WHERE id=$data[main]");
    }

    function zan($data){
        $res=$this->db->query("SELECT pid FROM bbs_zan WHERE pid=$data[pid] AND rid=$data[rid]");
        if ($res->num_rows()>0) return '你已经赞过了';
        else{
            $this->db->simple_query("INSERT INTO bbs_zan (pid,rid) VALUES ($data[pid],$data[rid])");
            $this->db->simple_query("UPDATE bbs_rep SET agree=agree+1 WHERE id=$data[rid]");
            return 'ok';
        }
    }
}
?>