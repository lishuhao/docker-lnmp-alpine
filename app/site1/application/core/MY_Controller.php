<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//后台管理控制器的父类
class MY_Controller extends CI_Controller  {

    public function __construct() {
        parent::__construct();
        $m = $this->router->method;
        if($m != 'login'){
            $this->load->helper('jwt');
            //检查cookie
            $login = check_admin_login();
            if(!$login){
                redirect('/admin/login');
                exit(0);
            }
            //设置cookie
            $new_jwt = update_login_cookie($login);
            $this->input->set_cookie(config_item('admin_cookie'),$new_jwt,config_item('jwt_exp'));
        }
    }
}
