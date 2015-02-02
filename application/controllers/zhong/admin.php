<?php
class admin extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('admin')){
            show_404();
        }
        $this->load->model('chou');
    }

    function index(){
        if ($data=$this->input->post(array('page','order','sort','rows'))){
            echo $this->chou->admList($data);
        }else $this->load->view('admin/zhong');
    }
    
    function check(){
        if ($data=$this->input->post(array('page','order','sort','rows'))){
            echo $this->chou->admList($data,true);
        }else $this->load->view('admin/zhong_sh');
    }

    function item($id='1'){
        if (!is_numeric($id)) show_404();
        $this->load->view('admin/zhong_shd');
    }

    function choujiang(){
        if ($data=$this->input->post(array('page','order','sort','rows'))){
            echo $this->chou->cjList($data);
        }else $this->load->view('admin/choujiang');
    }
}
?>