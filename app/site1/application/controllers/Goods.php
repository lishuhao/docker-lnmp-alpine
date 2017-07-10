<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->load->library('pagination');

        //分页配置
        $config['base_url'] = base_url('goods/index/');
        $config['total_rows'] = 400;
        $this->pagination->initialize($config);
        $pages = $this->pagination->create_links();
        $data = [
            'pages'=>$pages
        ];

        $this->load->view('admin/header');
        $this->load->view('admin/goods_list',$data);
        $this->load->view('admin/footer');
    }
}
