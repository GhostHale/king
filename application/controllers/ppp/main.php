<?php
    global $type;
    $type=0;
class main extends CI_Controller {
    
    function index(){
        $this->load->view('ppp/index');
    }
    
    /*
     * 公告列表
     */
     function annlist(){
         $this->load->view('ppp/anndetail');
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
          $this->load->view('ppp/anndetail');
      }
}
?>