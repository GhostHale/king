<?php
    global $type;
    $type=0;
class me extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('id')){
            $this->load->helper('functions');
            jumpback('请先登录！');
        }
    }

    function index(){
        $this->load->model('p2p');
        $data=$this->p2p->getMeIndex();
        echo "欢迎，".$_COOKIE['name']."<br />";
        echo "你的可用资金是$data[total],冻结资金是$data[froze],将获得$data[lend]本金。总资产".($data['total']+$data['froze']+$data['lend']);
        echo '<br /><a href="/user/recharge" target="_blank">充值</a>';
    }
    function info(){
        $this->load->model('p2p');
        $data=$this->p2p->getUserInfo();
        echo 'ok';
    }
    function picup($type=''){
        if (!is_numeric($type)) die('参数非法!');
        $dbinfo=array(array('table'=>'ppp_user','data'=>array('peo','bank','car','comany','marry','credit','tax','society','educa','house','hukou','skill'))
            ,array('table'=>'rank_worker','data'=>array('card','com','bhistory'))
            ,array('table'=>'rank_com','data'=>array('yyzz','zzdm','bhistory','swdj','gszc','nszm','sjbb'))
            ,array('table'=>'rank_tao','data'=>array('yyzz','smrz','jkzh','dmjt'))
            );
        $id=$this->session->userdata('id');
        if ($type<15) $rank=0;
        else {
            $rank=$this->db->query("SELECT rank FROM p2p_user WHERE pid=$id")->row()->rank;
            $type-=15;
        }
        $name=$dbinfo[$rank]['data'][$type];
        
        $config['upload_path'] = 'upload/pics/';
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