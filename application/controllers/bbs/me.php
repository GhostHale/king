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

}
?>