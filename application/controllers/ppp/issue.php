<?php
    global $type;
    $type=0;
class issue extends CI_Controller {

    function detail($id){
        if (!is_numeric($id)) show_404();
        $this->load->view('ppp/issue/detail');
    }
    
    function lend1(){
        $this->load->view('ppp/issue/lend1');
    }
    
    function lend2(){
        if ($data=$this->input->post()){
            $this->load->view('ppp/issue/lend3');
        }else $this->load->view('ppp/issue/lend2');
    }
}
?>