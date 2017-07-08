<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function __construct() {
        parent::__construct();

        //$this->load->library('session');
        $this->load->model('user_model','user');
        $this->load->model('post_model','post');
    }

    /**
	 *后台管理首页
	 */
	public function index()
	{
        //exit(0);
        //$this->load->helper('tag');
        /*if(!hasLogin()){
            redirect('admin/login');
            return;
        }*/
        //$posts = $this->post->get();
        /*$header = [
            'header'=>'Header',
            'sub_header'=>'sub header',
            'index'=>'true',
            'css'=>'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'
        ];*/
        /*$data = [
            'posts'=>$posts
        ];
        $footer = [
            'js'=>base_url('static/js/admin/index.js')
        ];*/

		$this->load->view('admin/header');
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
	}

    /**
     * 后台登录页
     */
	public function login(){
        $this->load->helper('jwt');
        $name = $this->input->post('name');
        $pwd = $this->input->post('pwd');

        if($name && $pwd){
            $jwt = gen_jwt($name);
            $this->input->set_cookie('jwt',$jwt,config_item('jwt_exp'));

            redirect('/admin/index');
        }
        $this->load->view('admin/login');
    }

    /**
     * 退出
     */
    public function logout(){
        $this->input->set_cookie('jwt','');
        redirect('/admin/login');
    }
}
