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
    function item($id=''){
        if (!is_numeric($id)) show_404();
        if ($data=$this->input->post('id','content')){
            $this->load->library('session');
            if ($data['pid']=$this->session->userdata('id')){
                echo $this->bbs->reply($data);
            }else echo '请先登录！';
        }else $this->load->view('bbs/item',$this->bbs->getItem($id));
    }
    
    function newone(){
        $this->load->helper('functions');
        $this->load->library('session');
        if ($id=$this->session->userdata('id')){
            if ($data=$this->input->post(array('title','content'))){
                $data['pid']=$id;
                if (($res=$this->bbs->addMain($data))===true) jump('发布成功！','/bbs/main');
                else jumpback($res);
            }else $this->load->view('bbs/write');
        }else jump('请先登录！','/bbs/main');
    }
    
}
?>