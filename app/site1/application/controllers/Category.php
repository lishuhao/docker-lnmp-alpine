<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('post_model','post');
        $this->load->model('Category_model','category');
    }

    //类目管理
    public function index()
    {
        //获取所有模块
        $top_category = $this->category->all_module();
        //递归获取所有一级分类的子分类
        $all_category = [];
        foreach ($top_category as $item){
            $all_category[] = $this->category->module_category($item['module']);
        }

        $data = [
            'top_category'=>$top_category,
            'all_category'=>$all_category
        ];
        //print_r($all_category);die();
        $this->load->view('admin/header');
        $this->load->view('admin/category',$data);
        $this->load->view('admin/footer');
    }

    public function get_category($category_id)
    {
        $category = $this->category->get_category($category_id);

        $data = [
            'category' => $category
        ];
        $footer = [
            'js'=>[
                base_url('static/js/admin/category_save.js'),
            ]
        ];
        $this->load->view('admin/header');
        $this->load->view('admin/category_edit',$data);
        $this->load->view('admin/footer',$footer);
    }

    //修改分类
    public function update_category()
    {
        $category['id'] = $this->input->post('id');
        $category['name'] = $this->input->post('name');

        //log_message('error',$category['name'].$category['id']);
        $res = $this->category->update_category($category);

        $status =  $res ? 0 : 1;
        echo json_encode(['status'=>$status,'msg'=>$res]);
        return;
    }

    public function delete_category($category_id)
    {
        $res = $this->category->delete_category($category_id);
        $status =  $res ? 0 : 1;
        echo json_encode(['status'=>$status,'msg'=>$res]);
        return;
    }
}
