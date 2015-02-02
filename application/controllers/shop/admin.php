<?php
class admin extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('admin')){
            show_404();
        }
        $this->load->model('shop');
    }
    
    function index(){
        if ($data=$this->input->post('page')){
            
        }else $this->load->view('admin/shop');
    }
}
?>