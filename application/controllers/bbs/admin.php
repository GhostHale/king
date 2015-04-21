<?php
class admin extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('admin')){
            show_404();
        }
    }

    function setRank(){
        if ($data=$this->input->post(array('pid','rank'))){
            if (!is_numeric($data['pid'])||!is_numeric($data['rank'])) show_404();
            else if ($this->db->simple_query("UPDATE bbs_user SET rank=$data[rank] WHERE pid=$data[pid]")) echo 'ok';
            else echo '未知错误';
        }else show_404();
    }
    
    function index(){
        if ($data=$this->input->post(array('page','rows','order','sort'))){
            $start = ($data['page'] - 1) * $data['rows'];
            $this->db->order_by($data['sort'],$data['order'])->limit($data['rows'],$start)->select('(SELECT `user` FROM user WHERE user.pid=bbs_user.pid) user,pid,name,rank,begin',false);
            $this->db->start_cache();
            if ($key=$this->input->post('key')) $this->db->like('name',$key);
            $res=$this->db->get('bbs_user')->result_array();
            $res=array('rows'=>$res,'total'=>$this->db->count_all_results());
            echo json_encode($res);
        }else $this->load->view('admin/bbs');
    }
}
?>