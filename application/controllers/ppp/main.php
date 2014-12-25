<?php
    global $type;
    $type=0;
class main extends CI_Controller {
    
    function index(){
        $this -> load -> model('p2p');
        $sql="SELECT ppp_bd.`total`,ppp_bd.`rate`,ppp_bd.`period`,ppp_bd.`paytype`,user.`user` FROM ppp_bd INNER JOIN user ON ppp_bd.`pid`=user.`pid` ";
        $result = $this->p2p->selectQuery($sql);
        print_r($result);
        $this->load->view('ppp/index',$result[0]);
        
    }
    
    /*
     * 公告列表
     */
     function annlist(){
         $this->load->view('ppp/ann');
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