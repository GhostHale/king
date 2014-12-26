<?php
    global $type;
    $type=0;
class main extends CI_Controller {
    
    function index(){
        $this->load->helper('date');
        $this -> load -> model('p2p');
        //p2p首页项目列表
        $sql="SELECT ppp_bd.`total`,ppp_bd.`rate`,ppp_bd.`period`,ppp_bd.`paytype`,ppp_bd.`end`,user.`user` FROM ppp_bd INNER JOIN user ON ppp_bd.`pid`=user.`pid` LIMIT 0,8";
        $num=$this->db->query('SELECT * FROM ppp_bd')->num_rows();
        //echo $num;
        $result = $this->p2p->selectQuery($sql);
        //print_r($result);
        $data['result'] = $result;
        $data['num'] = $num;

        //p2p首页公告列表
        $sql1="SELECT id,title,time FROM announce ORDER BY time DESC LIMIT 0,5";
        $num1=$this->db->query('SELECT * FROM announce')->num_rows();
        $result1 = $this->p2p->selectQuery($sql1);
        $data['result1'] = $result1;
        $data['num1'] = $num1;

        //当天日期
        $datestring = "%Y%m%d";
        $time  = time();
        $today = mdate($datestring, $time);
        $data['today'] = $today;
        $this->load->view('ppp/index',$data);

        //按钮状态判断
        //echo str_replace('-', '', $result1[0]['time']);
        //print_r($data);
        
    }
    
    /*
     * 公告列表
     */
     function annlist(){
         $this -> load -> model('p2p');
         $sql1="SELECT id,title,time FROM announce ORDER BY time DESC";
         $num1=$this->db->query('SELECT * FROM announce')->num_rows();
         $result1 = $this->p2p->selectQuery($sql1);
         $data['result1'] = $result1;
         $data['num1'] = $num1;
         $this->load->view('ppp/ann',$data);
         print_r($data);
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