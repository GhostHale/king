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
         if ($page=$this->input->post('page')){
             if (!is_numeric($page)) show_404();
             $offset=($page-1)*20;
             $sql="SELECT id,title,time FROM announce ORDER BY time DESC LIMIT $offset,20";
             $data['data'] = $this->db->query($sql)->result_array();
             $data['page'] = ceil($this->db->count_all('announce')/20);
             echo json_encode($data);
         }else $this->load->view('ppp/ann');
     }

     function anndetail($id=0){
          if ($id==0||!is_numeric($id)) show_404();
          $res=$this->db->query("SELECT * FROM announce WHERE id=$id");
          if ($res->num_rows()!=1) show_404();
          else $this->load->view('ppp/anndetail',$res->row_array());
      }

    function about($type=0){
        switch ($type){
            case 0:$this->load->view('ppp/about/about');break;
            case 1:$this->load->view('ppp/about/us');break;
            case 2:$this->load->view('ppp/about/us');break;
            case 3:$this->load->view('ppp/about/us');break;
            case 4:$this->load->view('ppp/about/us');break;
            case 5:$this->load->view('ppp/about/us');break;
            case 6:$this->load->view('ppp/about/us');break;
            default:break;
        }
    }
}
?>