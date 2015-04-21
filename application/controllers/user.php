<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
global $type;
$type=5;
class User extends CI_Controller
{
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
            return;
        }
        //载入表单验证类
        $this->load->library('form_validation');

        //设置规则
        $this->form_validation->set_rules(  'user',
                                            '用户名',
                                            'required|max_length[20]|alpha_dash|xss_clean');

        $this->form_validation->set_rules(  'psw',
                                            '密码',
                                            'required|min_length[5]');

        $this->form_validation->set_rules(  'phone',
                                            '电话',
                                            'trim|required|max_length[14]|is_numeric');

        $this->form_validation->set_rules(  'mail',
                                            '电子邮箱',
                                            'trim|required|max_length[50]|valid_email');
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

        $this->load->model('user_model', 'user');
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
        $this->load->model('user_model', 'user');
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
            $res=false;
        } else {
            $res=true;
        }
        return $res;
    }

    function login(){
        $username = $this->input->post('user');
        $password = $this->input->post('psw');
        if (!$username||!$password) show_404();
        $this->load->model('user_model', 'user');
        $res=$this->user->user_login($username,$password);
        if (is_array($res)){
            echo json_encode($res);
        }else echo json_encode(array('state'=>0,'error'=>$res));
    }

    function logout(){
        setcookie('name','',time()-1,'/');
        setcookie('bao','',time()-1,'/');
        setcookie('check','',time()-1,'/');
        $this->load->helper('functions');
        jump('退出成功！','/');
    }

    function recharge(){
        $this->load->library('session');
        $this->load->helper('functions');
        if (($id=$this->session->userdata('id'))===false)
            jump('请先登录！','/');
        if ($money=$this->input->post('money')){
            $this->load->model('user_model', 'user');
            if (($res=$this->user->recharge($money))===true) echo '充值成功！';
            else jumpback($res);
        }else echo '<form method="post">请输入充值数：<input name="money" type="text" /><input type="submit" value="submit" /></form>';
    }
    
    function me($type=0){
        if (!is_numeric($type)) show_404();
        $this->load->library('session');
        if (($id=$this->session->userdata('id'))===false){
            $this->load->helper('functions');
            jump('请先登录！','/');
        }
        $view='user/main';$data=array();
        switch($type){
            case 1:$this->load->model('p2p');$view='user/basicinfo';$data=$this->p2p->getUserInfo();break;
            case 2:$this->load->model('user_model','user');$view='user/xinyong';$data=$this->user->xinyong($id);break;
            case 3:$view='user/myborrow';break;
            case 4:$view='user/borrow';break;
            case 5:$view='user/myinvest';break;
            case 6:$view='user/licai';break;
            case 7:$view='user/buyhistory';break;
            case 8:$view='user/changeinfo';$data=$this->db->query("SELECT (SELECT rank FROM p2p_user WHERE p2p_user.pid=user.pid) rank,realname,peoid FROM user WHERE pid=$id")->row_array();break;
            default:break;
        }
        $this->load->view($view,$data);
    }
    
    function picup(){
        $type=$this->input->post('type');
        if (!is_numeric($type)) show_404();
        $this->load->helper('rank_helper');
        $this->load->library('session');
        $id=$this->session->userdata('id');
        $db=dbinfo($type);
        
        $config['upload_path'] = 'upload/userpics/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '2048';
        $config['file_name'] = $id.$db['name'];
        $config['overwrite'] = true;
        $this -> load -> library('upload', $config);
        if (!$this -> upload -> do_upload('file'))
            $info = $this -> upload -> display_errors('','');
        else {
            $data=$this->upload->data();
            $val=1;
            switch($data['file_ext']){
                case '.jpg':$val=2;break;
                case '.jpeg':$val=3;break;
                default:break;
            }
            $this->db->set($db['name'],$val)->where('pid',$id)->update($db['table']);
            $info='ok';
        }
        echo $info;
    }

    function changeInfo($type){
        if (!is_numeric($type)) show_404();
        $this->load->library('session');
        if (($id=$this->session->userdata('id'))===false){
            $this->load->helper('functions');
            jump('请先登录！','/');
        }
        $table='user';
        switch($type){
            case 1:$data=array('rank'=>$this->input->post('rank'));
                if (!is_numeric($data['rank'])) exit('输入非法!');
                $this->load->model('user_model','user');
                $this->user->changeRank(array('pid'=>$id,'rank'=>$data['rank']));
                $table='p2p_user';break;
            case 2:$data=$this->input->post(array('realname','peoid'));
                $res=$this->db->query("SELECT peoid FROM user WHERE pid=$id")->row()->peoid;
                if ($res!='') exit('呵呵');
                break;
            case 3:$data=md5(md5($this->input->post('opsw')));
                $res=$this->db->query("SELECT psw FROM user WHERE pid=$id")->row()->psw;
                if ($res!=$data) exit('原密码错误！');
                else $data=$this->input->post(array('psw'));
                break;
            case 4:$data=$this->input->post('ophone');
                $res=$this->db->query("SELECT phone FROM user WHERE pid=$id")->row()->phone;
                if ($res!=$data) exit('原手机号错误！');
                else $data=$this->input->post(array('phone'));
                break;
            default:exit('输入非法');
        }
        if ($this->db->update($table,$data,array('pid'=>$id))) echo 'ok';
        else echo 'Unknow error';
    }

    function adm_in(){
        $this->load->helper('functions_helper');
        if ($inp=$this->input->post(array('code','psw','user'))){
            if (!$this->vcode_match($inp['code'])) jumpback('验证码错误！');
            else{
                $string=file_get_contents('application/doyouknow.json');
                $table=json_decode(gzuncompress($string),true);
                if (isset($table[$inp['user']])&&md5(md5($inp['psw']))==$table[$inp['user']]['psw']){
                    $table[$inp['user']]['l']=$table[$inp['user']]['t'];
                    $table[$inp['user']]['t']=array('ip'=>$this->input->ip_address(),'time'=>date('Y-m-d H:i'));
                    $this->load->helper('file');
                    write_file('application/doyouknow.json',gzcompress(json_encode($table)));
                    $this->load->library('session');
                    $this->session->set_userdata('admin',$inp['user']);
                    header('Location:/doadmin/index','',301);
                }else jumpback('账号密码错误！');
            }
        }else{
            $this->load->view('admin/login');
        }
    }
    function test(){
        $table=array('zhang'=>array('psw'=>md5(md5('xiao')),'t'=>array('time'=>'','ip'=>''),'l'=>array('time'=>'','ip'=>'')));
        $this->load->helper('file');
        write_file('application/doyouknow.json',gzcompress(json_encode($table)));
    }
}
