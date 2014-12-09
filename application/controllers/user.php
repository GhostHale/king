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
        //载入表单验证类
        $this->load->library('form_validation');

        //设置规则

        $this->form_validation->set_rules(  'user',
                                            '用户名',
                                            'required|min_length[5]|max_length[20]');

        $this->form_validation->set_rules(  'psw',
                                            '密码',
                                            'required|min_length[5]|max_length[16]');

        $this->form_validation->set_rules(  'phone',
                                            '电话',
                                            'required|max_length[20]');

        $this->form_validation->set_rules(  'mail',
                                            '电子邮箱',
                                            'required|max_length[50]');
        $result = $this->form_validation->run();

        if(!$result){
            echo '表单信息有误';
            return false;
        }

         /*
         * 将注册信息写入数据库
         */

        //账号信息
        $user['user']         = $this->input->post('user',true);  //true是经过xss过滤
        $user['psw']          = md5(md5($this->input->post('psw'))); //两层加密一般解不出来
        $user['phone']        = $this->input->post('phone',true);
        $user['email']        = $this->input->post('mail',true);

        if($this->user->user_register('user',$user)){
            echo 'ok';
            return true;
        }else{
            echo '服务器繁忙请稍后再试';
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
     *确认验证码
     */
    function vcode_match($vcode)
    {
        session_start();
        if (!isset($_SESSION['yzm'])||$_SESSION['yzm']!= strtolower($vcode)) {
            return false;
        } else {
            return true;
        }
    }

    //暂时用用户名登录，到时再加两个参数做个判断就可以另外使用邮箱和电话号码实现登录
    function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->user->user_login($username,$password);
    }

    function logout(){
        $this->session->sess_destroy();
    }
}
