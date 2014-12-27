<?php
    global $type;
    $type=2;
class main extends CI_Controller {
    
    function index(){
        $this->load->view('shop/index');
    }
}
?>