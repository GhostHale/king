<?php
    global $type;
    $type=2;
class main extends CI_Controller {
    
    function index(){
        $this->load->view('shop/index');
    }

    function goods($id=false){
        if (!is_numeric($id)) show_404();
        $this->load->view('shop/goods');
    }

    function tobuy(){
        $this->load->library('session');
        if (($id=$this->session->userdata('id'))===false){
            $this->load->helper('functions');
            jump('请先登录！','/');
        }
        $data=$this->db->query("SELECT (SELECT name FROM shop_goods WHERE shop_goods.id=shop_tobuy.gid) name".
        ",gid,price,kind,type FROM shop_tobuy WHERE pid=$id")->result_array();
        $this->load->view('shop/tobuy',array('rows'=>$data));
    }
}
?>