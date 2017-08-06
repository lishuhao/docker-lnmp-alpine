<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('user_model','user');
        $this->load->model('post_model','post');
    }

    /**
     *后台管理首页
     */
    public function index()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/index');
        $this->load->view('admin/footer');
    }

    /**
     * 后台登录页
     */
    public function login(){
        $this->load->helper('jwt');
        //list($name,$pwd) = $this->input->post(['name','pwd']);
        $name = $this->input->post('name');
        $pwd = $this->input->post('pwd');

        if($name && $pwd){
            $jwt = gen_jwt(['name'=>$name,'role'=>'admin']);
            $this->input->set_cookie(config_item('admin_cookie'),$jwt,config_item('jwt_exp'));

            redirect('/admin/index');
        }
        echo $name.$pwd;
        $this->load->view('admin/login');
    }

    /**
     * 退出
     */
    public function logout(){
        $this->input->set_cookie(config_item('admin_cookie'),'');
        redirect('/admin/login');
    }
}
