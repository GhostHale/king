<?php
class Bbs extends CI_Model{
    function getMain($data){
        $off=($data['page']-1)*20;
        $sql="SELECT id,title,(SELECT `user` FROM user WHERE user.pid=main.pid) as `user`,".
        "(SELECT `pictou` FROM user WHERE user.pid=main.pid) as `tou`,".
        "(SELECT COUNT(*) FROM bbs_rep rep WHERE `main`=main.id) as rep,".
        "mid(`content`,1,20) as content".
        " FROM bbs_main main order by `time` DESC LIMIT $off,20";
        $res=$this->db->query($sql)->result_array();
        return array('data'=>$res,'page'=>ceil($this->db->query('SELECT count(*) AS num FROM bbs_main')->row()->num/20));
    }
    
    function addMain($data){
        if ($this->db->insert('bbs_main',$data)) return true;
        else return 'Unknown';
    }
    
    function getItem($id){
        $sql="SELECT (SELECT `user` FROM user WHERE user.pid=main.pid) as `user`,".
        "(SELECT COUNT(*) FROM bbs_rep rep WHERE `main`=main.id) as rep,".
        "title,content,time,append,readtimes FROM bbs_main main WHERE id=$id";
        $res=$this->db->query($sql);
        if ($res->num_rows()==1){
            $res=$res->row_array();
            if ($res['append']!=''){
                $res['append']=json_decode($res['append'],true);
            }else unset($res['append']);
            return $res;
        }else show_404();
    }
    
    
}
?>