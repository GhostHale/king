<?php
    global $type;
    $type=1;
class main extends CI_Controller {
    
    function index(){
        $this->load->view('zhong/index');
    }

    function detail($id='1'){
        if(!is_numeric($id)) show_404();
        
    }

    function resdetail($id='1'){
        if (!is_numeric($id)) show_404();
        $this->load->view('zhong/cjRes');
    }

    function cjDetail($id='1'){
        if (!is_numeric($id)) show_404();
    }
}
?>