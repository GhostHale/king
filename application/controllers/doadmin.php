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
        $this->load->view('admin/index');
    }

    function admin(){
        $string=file_get_contents('application/doyouknow.json');
        $table=json_decode(gzuncompress($string),true);
        $this->load->view('admin/admin',array('data'=>$table));
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
            }else $table[$data['user']]=array('psw'=>md5(md5($data['psw'])),'t'=>array('time'=>'','ip'=>''),'l'=>array('time'=>'','ip'=>''));
            $this->load->helper('file');
            write_file('application/doyouknow.json',gzcompress(json_encode($table)));
            echo 'ok';
        }
    }
    
    function delAdmin(){
        if ($data=$this->input->post('user')){
            if ($data=='zhang') exit('基本账户不可删除！');
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
        if ($data=$this->input->post(array('user','psw'))){
            $string=file_get_contents('application/doyouknow.json');
            $table=json_decode(gzuncompress($string),true);
            if (isset($table[$data['user']])){
                $table[$data['user']]['psw']=md5(md5($data['psw']));
                $this->load->helper('file');
                write_file('application/doyouknow.json',gzcompress(json_encode($table)));
                echo 'ok';
            }else echo '此用户不存在！';
        }
    }

    function logout(){
        $this->session->sess_destroy();
        $this->load->helper('functions_helper');
        jump('退出成功','/');
    }
}
?>