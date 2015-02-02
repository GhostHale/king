<?php
class Bbs extends CI_Model{
    function getMain($data){
        $off=($data-1)*20;
        $ord=" order by `time` DESC";
        $where="";
        if ($type=$this->input->post('type')) {
            if ($type==2){
                $this->load->library('session');
                if ($id=$this->session->userdata('id')){
                    $where=" WHERE main.pid=$id";
                }else exit;
            }else $ord=" order by `reply` DESC";
        }
        $sql="SELECT id,title,reply,(SELECT `name` FROM bbs_user WHERE bbs_user.pid=main.pid) as `name`,".
        "(SELECT `tou` FROM bbs_user WHERE bbs_user.pid=main.pid) as `tou`,".
        "mid(`content`,1,20) as content".
        " FROM bbs_main main$where$ord LIMIT $off,20";
        $res=$this->db->query($sql)->result_array();
        return array('data'=>$res,'page'=>ceil($this->db->query('SELECT count(*) AS num FROM bbs_main')->row()->num/20));
    }
    
    function addMain($data){
        if (isset($_FILES['file'])){
            $this->load->library('upload');
            $config['upload_path'] = 'upload/bbs/';
            $config['encrypt_name'] = true;
            $config['allowed_types'] = 'gif|txt|rar|zip|7z|doc|docx|png|jpg|jpge';
            $config['max_size'] = 20 * 1024 * 1024;//20MB
            //设置大小
            $this -> upload -> initialize($config);
            if (!$this -> upload -> do_upload("file")) {
                return $this -> upload -> display_errors();
            } else {
                $file = $this -> upload -> data();
                $data['append']=json_encode(array('n'=>$file['file_name'],'o'=>$file['orig_name'],'s'=>$file['file_size']));
            }
        }else echo 'nofile';
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
            $this->db->update('bbs_main',array('readtimes'=>$res['readtimes']+1),array('id'=>$id));
            return $res;
        }else show_404();
    }
    
    function reply($data){
        $rep='';
        if ($repid=$this->input->post('reply')){
            if (is_numeric($repid)){
                $res=$this->db->query("SELECT content,(SELECT `name` FROM bbs_user WHERE bbs_user.pid=rep.pid) FROM bbs_rep rep WHERE rid=$repid");
                if ($res->num_rows()==1){
                    $res=$res->row();
                    $res->content=substr($res->content,strstr($res->content,'<div class="com_value">')+23,-6);
                    $rep='<span class="reply_font">'.$res->name.'：</span>'.htmlspecialchars(substr(htmlspecialchars_decode($res->content),0,50),'ENT_NOQUOTES','UTF-8');
                }
            }else return json_encode(array('state'=>0,'info'=>'Are you kidding?'));
        }
        $data['content']=$rep.'<div class="com_value">'.htmlspecialchars($data['content'],'ENT_NOQUOTES','UTF-8').'</div>';
        $this->db->simple_query("UPDATE bbs_main SET reply=reply+1 WHERE id=$data[main]");
        $this->db->insert('bbs_rep',$data);
        $reply=$this->db->simple_query("SELECT reply FROM bbs_main WHERE id=$data[main]")->row()->reply;
        return json_encode(array('state'=>1,'info'=>ceil($reply/10)));
    }

    function repList($main,$page){
        $num=10;
        $off=($page-1)*$num;
        $sql="SELECT pid,rid,time,content,agree,(SELECT `name` FROM bbs_user WHERE bbs_user.pid=rep.pid) as `name`,".
        "(SELECT `tou` FROM bbs_user WHERE bbs_user.pid=rep.pid) as `tou`".
        " FROM bbs_rep rep WHERE main=$main LIMIT $off,$num";
        $pages=$this->db->query("SELECT count(*) page FROM bbs_rep WHERE main=$main")->row()->page;
        return json_encode(array('page'=>ceil($pages/$num),'data'=>$this->db->query($sql)->result_array()));
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