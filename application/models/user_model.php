<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    /*
     * 检查账号是否重名
     */
    function user_check($username)
    {
        $this->db->select('count(*) AS num');
        $this->db->where('user',$username); //查询条件
        $data = $this->db->get('user')->result_array(); //从哪张表,返回数据类型 result 是对象类型的result_array是数组类型
        //print_r($data);
        if ($data[0]['num'] > 0) {
            return false;    //这个玩意就是说重名了
        }
        return true;
    }


    /*
     * 用户注册
     */
    function user_register($table, $user)
    {
        $this->db->insert($table,$user);
        return true;
    }

    /*
     * 用户登录
     */
    function user_login($username,$password){
        $this->load->library('session');
        $this->db->select('count(*) AS num');
        $array  = array('user'=>$username,'psw'=>md5(md5($password)));
        $this->db->where($array); 
        $data = $this->db->get('user')->result_array();
        //var_dump($data);
        if ($data[0]['num'] > 0) {
          echo "登录成功";
            $this->db->select('id');
            $this->db->where('user',$username);
            $data = $this->db->get('user')->result_array();
            //var_dump($data);
            $user=array('id'=>$data[0]['id'],'user'=>$username);
            $this->session->set_userdata('user',$user);  //$_SESSION['user']=$user
            return true;
        }
        else
            return "用户名或密码错误";
    }


    /*
      * 更新表  用户修改信息
      * $tableName 表名
      * $data      更新数据
      * $where     where条件
      */
    public function updateTable($tableName,$data,$filed,$where){
        $this->db->where_in($filed,$where);
        $result = $this->db->update($tableName,$data);
        return $result;
    }


    /*
     * @TODO 设置登录之后的session
     */
    function setSession(){
        //
    }



}



 