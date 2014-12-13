<?php
    global $type;
    $type=0;
class issue extends CI_Controller {

    function detail($id){
        if (!is_numeric($id)) show_404();
        $this->load->view('ppp/issue/detail');
    }
    /*
     * 我要借贷
     */
    function lend1(){
        $this->load->view('ppp/issue/lend1');
    }
    /*
     * 我要借贷的表单显示和处理
     */ 
    function lend2(){
        if ($this->input->post('rate')){
            $this->load->library('form_validation');
            $config=array(array('field'=> 'title','rules'=>'trim|required|min_length[5]|max_length[20]|xss_clean')
                ,array('field'=>'total','rules'=>'trim|required|numeric')
                ,array('field'=>'rate','rules'=>'trim|required|greater_than[5000]')
                ,array('field'=>'intro','rules'=>'trim|required|max_length[10000]|xss_clean')
                //,array('field'=>'','rules'=>'')
                );
            $this->form_validation->set_rules($config);
            if (!$this->form_validation->run()) {
                echo 'error';
            }else {
                $data=$this->input->post(array('title','total','rate','intro'));
                $this->db->insert('issue',$data);
                $this->load->view('ppp/issue/lend3');
            }
        }else $this->load->view('ppp/issue/lend2');
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
        if ($data=$this->input->post()){
            
        }else{
            $this->load->view('ppp/issue/invdetail');
        }
    }

}
?>