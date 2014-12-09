<?php
    global $type;
    $type=0;
class main extends CI_Controller {
    
    function index(){
        $this->load->view('ppp/index');
    }
}
?>