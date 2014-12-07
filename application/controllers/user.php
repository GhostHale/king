<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
    /*
     * 构造函数
     */
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('user_model', 'user'); //自动载入模型 ,用user代替user_model
    }


    /*
     * 载入视图
     */
    function index()
    {
        $this->load->view('user/user_register');
    }

    function login(){
        $this->load->view('/user/user_login');
    }

    function file(){
        $this->load->helper('url');
        $this->load->view('upload');
    }


    /*
     * 验证码
     */
    function vcode()
    {
        $conf['name'] = 'yzm'; //session中验证码
        $conf['width'] = '120';
        $conf['height'] = '40';
        $conf['length'] = '4';
        $this->load->library('Captcha_code', $conf);
        $this->captcha_code->show();
    }


    /*
     * 注册
     */
    function register()
    {

        //初始化错误信息
        $error_message = array(
            'errCode' => '',
            'errMsg'  => ''
        );


        //载入表单验证类
        $this->load->library('form_validation');

        //设置规则

        $this->form_validation->set_rules(  'username',
                                            '用户名',
                                            'required|alpha_numeric|min_length[5]|max_length[16]');

        $this->form_validation->set_rules(  'password',
                                            '密码',
                                            'required|min_length[5]|max_length[16]');

        $this->form_validation->set_rules(  'repassword',
                                            '密码',
                                            'matches[password]');

        $this->form_validation->set_rules(  'phone',
                                            '电话',
                                            'required|max_length[20]');

        $this->form_validation->set_rules(  'email',
                                            '电子邮箱',
                                            'required|max_length[50]');

        $this->form_validation->set_rules(  'realname',
                                            '真实姓名',
                                            'required|min_length[5]|max_length[16]');
        
        $this->form_validation->set_rules(  'peoid',
                                            '身份证号码',
                                            'required|exact_length[18]');
    
        
        $this->form_validation->set_rules(  'address',
                                            '所在地',
                                            'required|max_length[50]');
    
        $this->form_validation->set_rules(  'vcode',
                                            '验证码',
                                            'callback_vcode_match');

        $result = $this->form_validation->run();

        if(!$result){
            $error_message['errCode'] = 1;
            $error_message['errMsg']  = '表单信息有误';
            echo json_encode($error_message);
            return false;
        }

        /*
            用户名查重
         */
        
       $username = $this->input->post('username');
       $this->user->user_check($username);
        if(!$this->user->user_check($username)){
            echo "该用户名已被注册";
            return "该用户名已被注册";
            exit();
        }
         /*
         * 将注册信息写入数据库
         */

        //账号信息
        $user['user']         = $this->input->post('username',true);  //true是经过xss过滤
        $user['psw']          = md5(md5($this->input->post('password',true))); //两层加密一般解不出来
        $user['phone']        = $this->input->post('phone',true); 
        $user['email']        = $this->input->post('email',true); 
        $user['realname']     = $this->input->post('realname',true);
        $user['peoid']        = $this->input->post('peoid',true);
        $user['sex']          = $this->input->post('sex');
        $user['address']      = $this->input->post('address',true);


        if($this->user->user_register('user',$user)){
            $error_message['errCode'] = 0;
            $error_message['errMsg']  = '注册成功';
            echo json_encode($error_message);
            return true;
        }else{
            $error_message['errCode'] = 4;
            $error_message['errMsg']  = '服务器繁忙请稍后再试';
            echo json_encode($error_message);
            return false;
        }

    }


    /*
     * 验证 账号 是否被使用
     */
    function username_check($username)
    {
        $data = array('user' => $username);
        if ( !$this->user->user_check($data) ) {
            return false;
        } else {
            return true;
        }
    }


   /*
    * 验证 账号 是否重名
    */
    function user_check($username)
    {
        $data = array('user' => $username);
        if ( !$this->user->user_check($data) ) {
            echo 0;
        } else {
            echo 1;
        }
    }


    /*
     *确认验证码
     */
    function vcode_match($vcode)
    {
        session_start();
        if ($_SESSION['yzm'] != strtolower($vcode)) {
            return false;
        } else {
            return true;
        }
    }

    //暂时用用户名登录，到时再加两个参数做个判断就可以另外使用邮箱和电话号码实现登录
    function user_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->user->user_login($username,$password);
    }

    /*function upload(){
        $config['upload_path']='./uploads/';
        $config['allowed_types']='gif|png|jpg|jpeg';
        $config['max_size']='100';
        $config['file_name']=$id."pictou";
        $this->load->library('upload',$config);
        $this->upload->do_upload('pictou');


    }*/
   
}
