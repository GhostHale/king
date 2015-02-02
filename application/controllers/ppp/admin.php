<?php
class admin extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('admin')){
            show_404();
        }
        $this->load->model('p2p');
    }

    function index(){
        if ($data=$this->input->post(array('page','order','sort','rows'))){
            echo $this->p2p->admList($data);
        }else $this->load->view('admin/ppp');
    }
    
    function check(){
        if ($data=$this->input->post(array('page','order','sort','rows'))){
            echo $this->p2p->admList($data,true);
        }else $this->load->view('admin/ppp_sh');
    }

    function item($id='1'){
        
    }

    function ann(){
        if ($data=$this->input->post(array('page','order','sort','rows'))){
            echo $this->p2p->annAdmList($data);
        }else $this->load->view('admin/ann');
    }

    function addann(){
        if ($data=$this->input->post(array('title','body'),true)){
            $data['time']=date('Y-m-d');
            $data['type']=1;
            $this->db->insert('ann',$data);
        }else $this->load->view('admin/addann');
    }
    
    function delann($id=0){
        if (!is_numeric($id)) show_404();
        if ($this->db->simple_query("DELETE FROM announce WHERE id=$id")) echo 'ok';
        else echo '未知错误';
    }
    
    function editann($id=0){
        if ($id==0||!is_numeric($id)) show_404();
        if ($data=$this->input->post(array('title','body'),true)){
            $data['time']=date('Y-m-d');
            $data['type']=1;
            $this->db->update('ann',$data);
        }else $this->load->view('ppp/admin/addann');
    }
}
?>