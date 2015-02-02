<?php
    global $type;
    $type=3;
class me extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('id')){
            $this->load->helper('functions');
            jumpback('请先登录！');
        }
    }

    function index(){
        
    }

    function init(){
        $id=$this->session->userdata('id');
        if ($data=$this->input->post(array('name'),true)){
            $data['pid']=$id;
            $data['begin']=date();
            $this->db->insert('bbs_user',$data);
            echo 'ok';
        }else{
            $res=$this->db->query("SELECT pid FROM bbs_user WHERE pid=$id");
            if ($res->num_rows()>0) echo '账号已激活！';
            else echo '<form method="post">请输入昵称：<input name="name" type="text" maxlength="12" /><input type="submit" value="submit" /></form>';
        }
    }
}
?>