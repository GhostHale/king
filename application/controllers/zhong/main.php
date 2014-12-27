<?php
    global $type;
    $type=1;
class main extends CI_Controller {
    
    function index(){
        $this->load->view('zhong/index');
    }
}
?>