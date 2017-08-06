<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('goods_model','goods');
    }

    public function index(){
        $offset = $this->uri->segment(3,0);
        $this->load->library('pagination');
        //分页
        $config['base_url'] = base_url('goods/index/');
        $config['total_rows'] = $this->goods->total_count();
        $this->pagination->initialize($config);
        $pages = $this->pagination->create_links();

        //结果集
        $goods = $this->goods->get($offset);
        $data = [
            'pages'=>$pages,
            'goods'=>$goods
        ];

        $this->load->view('admin/header');
        $this->load->view('admin/goods_list',$data);
        $this->load->view('admin/footer');
    }

    public function add()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/goods_add');
        $this->load->view('admin/footer');
    }
}
