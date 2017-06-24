<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller  {

    public function __construct() {
        parent::__construct();

        $this->load->helper(['url','login']);
        $this->load->library('session');
        $this->load->model('user_model','user');
        $this->load->model('post_model','post');
    }

    /**
	 *后台管理首页
	 */
	public function index()
	{
        $this->load->helper('tag');
        if(!hasLogin()){
            redirect('admin/login');
            return;
        }
        $posts = $this->post->get();
        $header = [
            'header'=>'Header',
            'sub_header'=>'sub header',
            'index'=>'true',
            'css'=>'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'
        ];
        $data = [
            'posts'=>$posts
        ];
        $footer = [
            'js'=>base_url('static/js/admin/index.js')
        ];

		$this->load->view('admin/header',$header);
		$this->load->view('admin/index',$data);
		$this->load->view('admin/footer',$footer);
	}

    /**
     * 后台登录页
     */
	public function login(){
        $name = $this->input->post('name');
        $pwd = $this->input->post('pwd');
        if($name && $pwd){
            $result = $this->user->check_pwd();
            if($result){
                $this->session->set_userdata('login', 'true');
                redirect('/admin/index');
                return TRUE;
            }
        }
        $this->load->view('admin/login');
    }

    /**
     * 退出
     */
    public function logout(){
        $this->session->unset_userdata('login');
        redirect('/admin/login');
    }
}
