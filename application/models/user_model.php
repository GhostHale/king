<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    /*
     * 检查是否重复
     */
    function is_unique($cou,$data)
    {
        $this->db->where($cou,$data); //查询条件
        $data = $this->db->get('user'); //从哪张表,返回数据类型 result 是对象类型的result_array是数组类型
        if ($data->num_rows()>0) {
            return true;    //这个玩意就是说重名了
        }else return false;
    }

    /*
     * 用户注册
     */
    function user_register($user)
    {
        if ($this->is_unique('phone',$user['phone'])) return '手机号码已存在！';
        if ($this->is_unique('email',$user['email'])) return '此邮箱已存在！';
        if ($this->is_unique('user',$user['user'])) return '此用户名已存在！';
        $this->db->insert('user',$user);
        $id=$this->db->insert_id();
        $this->db->query("INSERT INTO possess (pid) VALUES ($id)");
        $this->session->set_userdata('id',$id);
        setcookie('name',$user['user'],time()+3600*24,'/','',false,true);
        return true;
    }

    /*可以根据用户名、邮箱和手机来登陆
     * 用户登录
     */
    function user_login($username,$password){
        $que=array();
        if (is_numeric($username)) $que['phone']=$username;
        else if (strstr($username,'@')>0) $que['email']=$username;
        else $que['user']=$username;
        $this->db->where($que);
        $data = $this->db->select('pid,user,psw')->get('user');
        if ($data->num_rows()==1) {
            $data=$data->row();
            if ($data->psw==md5(md5($password))){
                $this->session->set_userdata('id',$data->pid);
                if ($this->input->post('save')){
                    $this->load->helper('login');
                    $check=setcheck();$dbcheck=check($check);
                    $time=time()+604800;
                    setcookie('check',$dbcheck,$time,'/','',false,true);
                    setcookie('name',$data->user,$time,'/');
                    $this->db->query("UPDATE user SET `check`='$dbcheck' WHERE pid=?",$data->pid);
                }else{
                    setcookie('name',$data->user,time()+86400,'/');
                }
                return array('state'=>1,'name'=>$data->user);
            }else return "用户名、密码错误！";
        }else return "用户名不存在！";
    }

    function changeRank($info){
        $this->load->helper('rank_helper');
        $rank=$this->db->query("SELECT rank FROM p2p_user WHERE pid=$info[pid]")->row()->rank;
        $table=rankTable($rank);
        $this->db->simple_query("DELETE FROM $table WHERE pid=$info[pid]");
        if ($table=rankTable($info['rank']))
            $this->db->simple_query("INSERT INTO $table (pid) VALUES ($info[pid])");
    }

    function recharge($money){
        if (!is_numeric($money)) return '必须是整数！';
        $id=$this->session->userdata('id');
        if ($this->db->query("UPDATE possess SET access=access+$money WHERE pid=$id")) return true;
        else return 'unknown error';
    }

    function xinyong($id){
        $res=$this->db->query("SELECT * FROM p2p_user WHERE pid=$id")->row_array();
        $this->load->helper('rank_helper');
        if ($table=rankTable($res['rank'])){
            $res=array_merge($res,$this->db->query("SELECT * FROM $table WHERE pid=$id")->row_array());
            unset($res['pid']);unset($res['rank']);
            return dealPic($res);
        }else{
            $this->load->helper('functions_helper');
            jump('请先完善信息！','1');
        }
    }
}



 