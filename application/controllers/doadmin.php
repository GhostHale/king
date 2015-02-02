<?php
class doadmin extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('admin')){
            show_404();
        }
    }
    
    function index(){
        $this->load->view('admin/index',array('user'=>$this->session->userdata('admin')));
    }

    function addAdmin(){
        if ($data=$this->input->post(array('psw','user'))){
            if (strlen($data['user'])>16) return;
            $string=file_get_contents('application/doyouknow.json');
            $table=json_decode(gzuncompress($string),true);
            $data['psw']=md5(md5($data['psw']));
            if (isset($table[$data['user']])){
                echo '此用户名已存在';
                return;
            }else $table[$data['user']]=$data['psw'];
            $this->load->helper('file');
            write_file('application/doyouknow.json',gzcompress(json_encode($table)));
            echo 'ok';
        }
    }
    
    function delAdmin(){
        if ($data=$this->input->post('user')){
            $string=file_get_contents('application/doyouknow.json');
            $table=json_decode(gzuncompress($string),true);
            if (isset($table[$data])){
                unset($table[$data]);
                $this->load->helper('file');
                write_file('application/doyouknow.json',gzcompress(json_encode($table)));
                echo 'ok';
            }else echo '此用户名不存在';
        }
    }

    function setPsw(){
        if ($data=$this->input->post(array('opsw','npsw'))){
            $string=file_get_contents('application/doyouknow.json');
            $table=json_decode(gzuncompress($string),true);
            $data['opsw']=md5(md5($data['opsw']));
            $user=$this->session->userdata('admin');
            if ($table[$user]==$data['opsw']){
                $table[$user]=$data['npsw'];
                $this->load->helper('file');
                write_file('application/doyouknow.json',gzcompress(json_encode($table)));
                echo 'ok';
            }else echo '原密码错误！';
        }
    }

    function logout(){
        $this->session->sess_destroy();
        header('Location:/','',301);
    }
}
?>