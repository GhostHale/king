<?php
class admin extends CI_Controller {
    function addann(){
        if ($data=$this->input->post(array('title','body'),true)){
            $data['time']=date('Y-m-d');
            $data['type']=1;
            $this->db->insert('ann',$data);
        }else $this->load->view('ppp/admin/addann');
    }
    
    function delann($id=0){
        if ($id==0||!is_numeric($id)) show_404();
        if ($this->db->where('id',$id)->delete('ann')) echo 'ok';
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