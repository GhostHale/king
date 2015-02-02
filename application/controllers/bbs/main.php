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
        if ($data=$this->input->post('page')){
            if (!is_numeric($data)) show_404();
            echo json_encode($this->bbs->getMain($data));
        }else $this->load->view('bbs/index');
    }
    /*
     * 显示帖子具体内容，处理回复
     */
    function item($id='a'){
        if (!is_numeric($id)) show_404();
        if ($data=$this->input->post('content')){//回复帖子
            $this->load->library('session');
            $data=array('content'=>$data);
            $data['main']=$id;
            if ($data['pid']=$this->session->userdata('id')){
                if ($this->db->query("SELECT rank FROM bbs_user WHERE pid=$data[pid]")->num_rows()==0)
                    echo json_encode(array('state'=>0,'info'=>'请先激活！'));
                else echo $this->bbs->reply($data);
            }else echo json_encode(array('state'=>0,'info'=>'请先登录！'));
        }else if($data=$this->input->post('page')&&is_numeric($page)){//显示回复内容
            echo $this->bbs->repList($id,$page);
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
    
    function download($name='',$show=''){
        if (strlen($name)==0) show_404();
        if (strlen($show)==0) urldecode($name);
        else $show=urldecode($show);
        $name='upload/bbs'.$name;
        if (file_exists($name)){
            header('Content-Type: "application/octet-stream"');
            header('Content-Disposition: attachment; filename="'.$show.'"');
            header("Content-Length: ".filesize($name));
            header("Content-Transfer-Encoding: binary");
            header('Expires: 0');
            if (strpos($_SERVER['HTTP_USER_AGENT'], "MSIE") !== FALSE){
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
            }else{
                header('Pragma: no-cache');
            }
            readfile($name);
        }else{
            $this->load->helper('static');
            jumpback('文件不存在！');
        }
    }

    function userInfo($id=0){
        if (!is_numeric($id)) show_404();
        
    }
}
?>