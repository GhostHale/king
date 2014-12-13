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
        $this->load->model('user_model', 'user'); //自动载入模型 ,用user代替user_model
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
        if (!$this->input->post('code')){
            $this->load->view('register');
            return;
        }
        if (!$this->vcode_match($this->input->post('code'))){
            echo '验证码错误！';
            //session_destroy();
            return;
        }//else session_destroy();
        //载入表单验证类
        $this->load->library('form_validation');

        //设置规则
        $this->form_validation->set_rules(  'user',
                                            '用户名',
                                            'required|min_length[5]|max_length[20]|alpha_dash|xss_clean');

        $this->form_validation->set_rules(  'psw',
                                            '密码',
                                            'required|min_length[5]|max_length[16]');

        $this->form_validation->set_rules(  'phone',
                                            '电话',
                                            'required|max_length[20]|is_numeric');

        $this->form_validation->set_rules(  'mail',
                                            '电子邮箱',
                                            'required|max_length[50]|valid_email');
        $result = $this->form_validation->run();

        if(!$result){
            echo '表单信息有误';
            return false;
        }

         /*
         * 将注册信息写入数据库
         */

        //账号信息
        $user['user']         = $this->input->post('user');  //true是经过xss过滤
        $user['psw']          = md5(md5($this->input->post('psw'))); //两层加密一般解不出来
        $user['phone']        = $this->input->post('phone');
        $user['email']        = $this->input->post('mail');

        if(($res=$this->user->user_register($user))===true){
            echo 'ok';
        }else{
            echo $res;
        }

    }

    /*
     * 验证 账号 是否被使用
     */
    function username_check($username){
        if ($this->user->is_unique('user',$user['user'])) echo '此用户名已存在！';
        else echo 'ok';
    }

    /*
     *确认验证码
     */
    function vcode_match($vcode)
    {
        return true;
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
        if (!$username||!$password) show_404();
        if (($res=$this->user->user_login($username,$password))===true){
            echo 'ok';
        }else echo $res;
    }

    function logout(){
        $this->session->unset_userdata('id');
        setcookie('name','',time()-1,'/');
        setcookie('check','',time()-1,'/');
        $this->load->helper('functions');
        jump('退出成功！','/');
    }
}
