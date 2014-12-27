<?php
    global $type;
    $type=0;
class issue extends CI_Controller {

    /*
     * 我要借贷
     */
    function lend1(){
        $this->load->library('session');
        $this->load->helper('functions');
        if (($id=$this->session->userdata('id'))===false)
            jump('请先登录！','/');
        $res=$this->db->query("SELECT rank FROM p2p_user WHERE pid=$id");
        if ($res->num_rows()!=1)
            return jump('请先激活账号','/');
        else{
            $res=$res->row()->rank;
            if ($res==0) return jump('请先完善账号信息','/');
            $this->session->set_userdata('rank',$res);
            $this->load->view('ppp/issue/lend1',array('rank'=>$res));
        }
    }
    /*
     * 我要借贷的表单显示和处理
     */ 
    function lend2(){
        $this->load->library('session');
        if (($id=$this->session->userdata('id'))===false){
                jump('请先登录！','/');
                return;
            }
        if (($rank=$this->session->userdata('rank'))===false){
            return header('Location:/ppp/issue/lend1');
        }
        if ($this->input->post('rate')){
            $this->load->model('p2p');
            if (($res=$this->p2p->addBd())===true) $this->load->view('ppp/issue/lend3');
            else echo $res;
        }else $this->load->view('ppp/issue/lend2',array('rank'=>$rank));
    }
    /*
     * 显示标段列表页面，返回json数据
     */ 
    function bdshow(){
        if ($data=$this->input->post()){
            
        }else{
            $this->load->view('ppp/issue/invest');
        }
    }
    /*
     * 显示标段详细信息，处理投资信息
     */ 
    function bddetail($id=0){
        if ($id==0||!is_numeric($id)) show_404();
        if ($money=$this->input->post('money')){
            if (!is_numeric($money)){
                echo 'illigal input';
            }else{
                $this->load->model('p2p');
                if (($res=$this->p2p->invest($money,$id))===true){
                    echo 'ok';
                }else echo $res;
            }
        }else{
            $sql="SELECT *,(SELECT `user` FROM user WHERE user.pid=p2p_bd.pid) as `user` FROM p2p_bd WHERE bid=$id";
            $res=$this->db->query($sql);
            if ($res->num_rows()!=1) show_404();
            $res=$res->row_array();
            if ($res['status']==0||$res['status']==6) die('想钱也不是这样想的啊！');
            else $this->load->view('ppp/issue/invdetail',$res);
        }
    }

}
?>