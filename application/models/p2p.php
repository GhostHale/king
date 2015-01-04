<?php
class P2p extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
    }
    
    function addBd(){
        $this->load->library('form_validation');
        $config=array(array('field'=> 'title','rules'=>'trim|required|min_length[5]|max_length[20]|xss_clean')
            ,array('field'=>'total','rules'=>'trim|required|greater_than[5000]')
            ,array('field'=>'rate','rules'=>'trim|required')
            ,array('field'=>'intro','rules'=>'trim|required|max_length[10000]|xss_clean')
            ,array('field'=>'paytype','rules'=>'required|numeric')
            ,array('field'=>'type','rules'=>'required|numeric')
            ,array('field'=>'isday','rules'=>'required|numeric')
            ,array('field'=>'period','rules'=>'required|numeric')
            //,array('field'=>'','rules'=>'')
            );
        $this->form_validation->set_rules($config);
        if (!$this->form_validation->run()) {
            return '表单信息有误！';
        }else {
            $data=$this->input->post(array('title','total','rate','intro','paytype','type','isday','period','start','end'));
            $data['pid']=$this->session->userdata('id');
            $data['need']=$data['total'];
            $data['isday']=($data['isday']=1)?0:1;
            $data['bdtype']=$this->session->userdata('rank');
            $this->db->insert('p2p_bd',$data);
            return $data;
        }
    }

    function bdList($page){
        $size=15;
        $this->db->start_cache();
        $this->db->select('bid,title,rate,rank,total,period,need,isday,(SELECT user FROM user WHERE user.pid=p2p_bd.pid) name',false)->order_by('rank,end')->limit($size,($page-1)*$size)->where('status',1);
        if ($sel=$this->input->post('rate')){
            switch($sel){
                case 1:$this->db->where('rate BETWEEN 8 AND 13',null,false);break;
                case 2:$this->db->where('rate BETWEEN 13 AND 18',null,false);break;
                case 3:$this->db->where('rate BETWEEN 18 AND 24',null,false);break;
                default:break;
            }
        }
        if ($sel=$this->input->post('period')){
            switch($sel){
                case 1:$this->db->where('period<=',3,false);break;
                case 2:$this->db->where('period BETWEEN 3 AND 6',null,false);break;
                case 3:$this->db->where('period BETWEEN 6 AND 12',null,false);break;
                default:break;
            }
        }
        if ($sel=$this->input->post('period')&&is_numeric($sel)&&$sel!=0)
            $this->db->where('rank',$sel);
        $res=array('data'=>$this->db->get('p2p_bd')->result_array());
        $res['pages']=ceil($this->db->count_all_results()/$size);
        return $res;
    }

    function getUserInfo(){
        $id=$this->session->userdata('id');
        $res=$this->db->query("SELECT user,phone,(SELECT access FROM possess WHERE pid=user.pid) as access FROM user WHERE pid=$id")->row_array();
        $sql=$this->db->query("SELECT rank FROM p2p_user WHERE pid=$id");
        if ($sql->num_rows()==0){
            $this->db->query("INSERT INTO  p2p_user (`pid`) VALUES ($id)");
            $res['rank']=0;
        }else{
            $res['rank']=$sql->row()->rank;
        }
        return $res;
    }

    function getMeIndex(){
        $id=$this->session->userdata('id');
        $data=$this->db->query("SELECT * FROM possess WHERE pid=$id")->row_array();
        return $data;
    }
    
    function getIndex(){
        $sql="(SELECT bid,`total`,title,`rate`,`period`,`paytype`,status,`end`,(SELECT `user` FROM user WHERE user.pid=p2p_bd.pid) as `user` FROM p2p_bd";
        $sql=$sql." WHERE status=1 ORDER BY end LIMIT 0,6) UNION ".$sql." WHERE status=2 ORDER BY end DESC LIMIT 0,2)";
        $data['bd'] =  $this->db->query($sql)->result_array();

        //p2p首页公告列表
        $sql="SELECT id,title,time FROM announce ORDER BY time DESC LIMIT 0,5";
        $data['ann'] = $this->db->query($sql)->result_array();
        return $data;
    }
    
    function invest($money,$bid){
        $id=$this->session->userdata('id');
        $this->db->trans_start();
        $data=$this->db->query("SELECT access,froze FROM possess WHERE pid=$id FOR UPDATE")->row_array();
        $have=$data['access'];
        if ($have>=$money){
            $data['access']-=$money;
            $data['froze']+=$money;
            $this->db->where('pid',$id)->update('possess',$data);
            $this->db->insert('p2p_tz',array('pid'=>$id,'bid'=>$bid,'money'=>$money));
            if ($this->db->trans_complete()) return true;
            else return '未知错误';
        }else{
            $this->db->trans_complete();
            return '余额不足，请充值！';
        }
        
    }
}
?>