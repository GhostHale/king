<?php
    global $type;
    $type=1;
class issue extends CI_Controller {
    
    function resdetail($id='a'){
        if (!is_numeric($id)) show_404();
        $this->load->view('zhong/cjRes');
    }
}
?>