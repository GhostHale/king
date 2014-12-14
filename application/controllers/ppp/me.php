<?php
    global $type;
    $type=0;
class main extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('id')){
            $this->load->helper('functions');
            jumpback('请先登录！');
        }
    }

    function index(){
        $this->load->view('ppp/index');
    }
    
    function picup($type=''){
        if (!is_numeric($type)) die('参数非法!');
        $dbinfo=array(array('table'=>'ppp_user','data'=>array('peo','bank','car','comany','marry','credit','tax','society','educa','house','hukou','skill'))
            ,array('table'=>'rank_worker','data'=>array('card','com','bhistory'))
            ,array('table'=>'rank_com','data'=>array('yyzz','zzdm','bhistory','swdj','gszc','nszm','sjbb'))
            ,array('table'=>'rank_tao','data'=>array('yyzz','smrz','jkzh','dmjt'))
            );
        $id=$type->session(userdata('id'));
        if ($type<15) $rank=0;
        else {
            $rank=$this->db->query("SELECT rank FROM ppp_user WHERE pid=$id")->row()->rank;
            $type-=15;
        }
        $name=$dbinfo[$rank]['data'][$type];
        
        $config['upload_path'] = 'upload/ppp_pic/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '2048';
        $config['file_name'] = $id.$name;
        $config['overwrite'] = true;
        $this -> load -> library('upload', $config);
        if (!$this -> upload -> do_upload())
            $info = $this -> upload -> display_errors('','');
        else {
            $this->db->set($name,1)->where('pid',$id)->update($dbinfo[$rank]['table']);
            $info='ok';
        }
        echo $info;
    }
}
?>