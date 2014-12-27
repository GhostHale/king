<?php
    global $type;
    $type=0;
class main extends CI_Controller {
    
    function index(){
        $this -> load -> model('p2p');
        $this->load->view('ppp/index',$this->p2p->getIndex());
    }
    /*
     * 公告列表
     */
     function annlist(){
         $sql="SELECT id,title,time FROM announce ORDER BY time DESC";
         $data['ann'] = $this->db->query($sql)->result_array();
         $data['num1'] = $this->db->count_all('announce');
         $this->load->view('ppp/ann',$data);
     }
     
    /*
     * 公告列表信息
     */
     function anninfo($page=1){
         if (!is_numeric($page)) show_404();
         echo json_encode($data);
     }
     
     /*
      * 
      */
      function anndetail($id=0){
          if ($id==0||!is_numeric($id)) show_404();
          $res=$this->db->query("SELECT * FROM announce WHERE id=$id");
          if ($res->num_rows()!=1) show_404();
          else $this->load->view('ppp/anndetail',$res->row_array());
      }
}
?>