<?php
    global $type;
    $type=3;
class main extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('bbs');
    }
    /*
     * 显示首页，返回数据
     */
    function index(){
        if ($data=$this->input->post(array('page'))){
            if (!is_numeric($data['page'])) show_404();
            echo json_encode($this->bbs->getMain($data));
        }else $this->load->view('bbs/index');
    }
    /*
     * 显示帖子具体内容，处理回复
     */
    function item($id='a'){
        if (!is_numeric($id)) show_404();
        if ($data=$this->input->post('content')){
            $this->load->library('session');
            $data['main']=$id;
            if ($data['pid']=$this->session->userdata('id')){
                if ($this->db->query("SELECT rank FROM bbs_user WHERE pid=$data[pid]")->num_rows()==0) die('请先激活！');
                echo $this->bbs->reply($data);
            }else echo '请先登录！';
        }else $this->load->view('bbs/item',$this->bbs->getItem($id));
    }
    
    function zan($id='a'){
        if (!is_numeric($id)) show_404();
        $this->load->library('session');
        if ($data['pid']=$this->session->userdata('id')){
            $data['rid']=$id;
            echo $this->bbs->zan($data);
        }else echo '请先登录！';
    }

    function newone(){
        $this->load->helper('functions');
        $this->load->library('session');
        if ($id=$this->session->userdata('id')){
            if ($this->db->query("SELECT rank FROM bbs_user WHERE pid=$id")->num_rows()==0){
                jump('请先激活！','/bbs/me/init');
                return;
            }
            if ($data=$this->input->post(array('title','content'))){
                $data['pid']=$id;
                if (($res=$this->bbs->addMain($data))===true) jump('发布成功！','/bbs/main');
                else jumpback($res);
            }else $this->load->view('bbs/write');
        }else jump('请先登录！','/bbs/main');
    }
    
}
?>