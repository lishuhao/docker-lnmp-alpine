<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Category_model','category');
    }

    public function index(){
        $posts = $this->post->get();
        $data = [
            'posts'=>$posts
        ];
        $this->load->view('admin/header');
        $this->load->view('admin/post_list',$data);
        $this->load->view('admin/footer');
    }

    //添加文章
    public function add(){
        if($this->input->method() == 'post'){   //保存文章
            //保存文章
            $this->post->insert();
            redirect('/post/index');
            exit(0);
        }
        $footer = [
            'js'=>[
                base_url('static/wangeditor/wangEditor.min.js'),
                base_url('static/js/admin/add.js'),
            ]
        ];

        $this->load->view('admin/header');
        $this->load->view('admin/add_post');
        $this->load->view('admin/footer',$footer);
    }

    //彻底删除
    public function delete(){
        $this->post->delete_one();
    }

    //保存到草稿
    public function draft_one(){
        $this->post->draft_one();
    }

    //更新文章
    public function update(){
        if($this->input->method() == 'post'){   //保存文章
            //更新文章
            $this->post->update();
            redirect('/admin/index');
            exit(0);
        }

        //加载视图
        $this->load->helper('tag');
        $header = [
            'header'=>'Header',
            'sub_header'=>'sub header',
            'add'=>'true',
        ];
        $pid = $this->input->get('id');
        $data = $this->post->get_one($pid);
        $footer = [
            'js'=>[
                base_url('static/ckeditor/ckeditor.js'),
                base_url('static/js/admin/add.js')
            ]
        ];
        $this->load->view('admin/header',$header);
        $this->load->view('admin/add',$data);
        $this->load->view('admin/footer',$footer);
    }

    //获取
    public function get_one(){
        $this->post->get_one();
    }

    public function upload_img(){
        header('Content-Type: application/json');
        $config['upload_path']      = config_item('img_location');
        $config['allowed_types']    = config_item('img_ext');
        $config['max_size']         = config_item('img_size');
        $config['file_name']       = time();
        $this->load->library('upload', $config);

        if(!$this->upload->do_upload()){
            $err_msg = $this->upload->display_errors();
            $json = [
                'errno'=>1,
                'msg'=>$err_msg
            ];
            echo json_encode($json);
            return TRUE;
        }else{
            $upload_data = $this->upload->data();
            $img_url = base_url('static/upload/').$upload_data['file_name'];
            $json = [
                'errno'=>0,
                'data'=>[$img_url]
            ];
            echo json_encode($json);
            return TRUE;
        }

    }

    //添加文章分类
    public function add_category(){
        $res = $this->category->module_category('post');

        $data['all_category'] = $res;
        $this->load->view('admin/header');
        $this->load->view('admin/add_post_category',$data);
        $this->load->view('admin/footer');
    }
}
