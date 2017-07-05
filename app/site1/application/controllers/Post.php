<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(['url','login']);
        if(!hasLogin()){
            redirect('admin/login');
            return;
        }

        $this->load->model('post_model','post');
    }

    //添加文章
    public function add(){
        if($this->input->method() == 'post'){   //保存文章
            //保存文章
            $this->post->insert();
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
        $footer = [
            'js'=>[
                base_url('static/ckeditor/ckeditor.js'),
                base_url('static/js/admin/add.js')
            ]
        ];
        $this->load->view('admin/header',$header);
        $this->load->view('admin/add');
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
        //判断是否是非法调用
        if(empty($_GET['CKEditorFuncNum'])){
            $this->mkHtml(1,"","错误的功能调用请求");
        }

        $config['upload_path']      = './static/upload/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = 2000;
        $config['file_name']       = time();

        $this->load->library('upload', $config);
        $fn = $_GET['CKEditorFuncNum'];
        if(!$this->upload->do_upload('upload')){
            $err_msg = $this->upload->display_errors();
            $this->mkHtml($fn,'' ,$err_msg);
        }else{
            $upload_data = $this->upload->data();
            $img_url = base_url('static/upload/').$upload_data['file_name'];
            $this->mkHtml($fn,$img_url ,'上传成功');
        }

    }

    //输出js调用
    private function mkHtml($fn,$fileUrl,$message){
        $str='<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction('.$fn.', \''.$fileUrl.'\', \''.$message.'\');</script>';
        exit($str);
    }
}
