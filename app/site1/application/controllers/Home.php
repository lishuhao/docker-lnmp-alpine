<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        //$this->load->helper('encrypt');
        //frontend_check_login();
        $this->load->view('welcome_message');
    }

    //初始化数据库
    public function install(){
        $this->load->helper(['file','encrypt']);
        //创建数据库
        $db_name = 'mydb';
        $db_pwd = getenv('MYSQL_ENV_MYSQL_ROOT_PASSWORD');
        try{
            $dbh = new pdo('mysql:host=mysql', 'root', $db_pwd);
        } catch(PDOException $e){
            die('Connection failed: ' . $e->getMessage());
        }
        $dbh->exec("CREATE DATABASE IF NOT EXISTS {$db_name}");
        $conn = new pdo("mysql:host=mysql;dbname={$db_name}", 'root', $db_pwd);

        //建表

        //users
        $tables[] = "CREATE TABLE IF NOT EXISTS `users` (
          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
          `name` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
          `pwd` varchar(100) NOT NULL DEFAULT '' COMMENT '密码',
          `phone` varchar(100) DEFAULT '' COMMENT '手机',
          `email` varchar(100) DEFAULT '' COMMENT '邮箱',
          `registered` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
          PRIMARY KEY (`id`),
          UNIQUE KEY `name` (`name`),
          KEY `phone` (`pwd`),
          KEY `register` (`phone`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='注册用户'";

        //admin
        $tables[] = "CREATE TABLE IF NOT EXISTS `admin` (
          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
          `name` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
          `pwd` varchar(100) DEFAULT '' COMMENT '密码',
          `phone` varchar(100) DEFAULT '' COMMENT '手机',
          `email` varchar(100) DEFAULT '' COMMENT '邮箱',
          `perm` varchar(100) DEFAULT '' COMMENT '权限',
          PRIMARY KEY (`id`),
          UNIQUE KEY `name` (`name`),
          KEY `pwd` (`pwd`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='管理员'";

        //post
        $tables[] = "CREATE TABLE IF NOT EXISTS `post` (
          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
          `title` varchar(100) CHARACTER SET latin1 DEFAULT '' COMMENT '标题',
          `content` varchar(5000) CHARACTER SET latin1 DEFAULT '' COMMENT '内容',
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='资讯'";

        //商品分类
        $tables[] = "CREATE TABLE IF NOT EXISTS `goods_type` (
          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
          `name` varchar(50) DEFAULT '' COMMENT '分类名',
          `count` int(11) DEFAULT '0' COMMENT '该分类下商品数',
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='商品分类'";

        //商品
        $tables[] = "CREATE TABLE `goods` (
          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
          `name` varchar(100) DEFAULT '' COMMENT '商品名',
          `img` varchar(200) DEFAULT '' COMMENT '商品图片',
          `detail` varchar(500) DEFAULT '' COMMENT '商品详情',
          `current_price` int(11) DEFAULT '1' COMMENT '现价／分',
          `original_price` int(11) DEFAULT '1' COMMENT '原价／分',
          `cat_id` int(11) DEFAULT '0' COMMENT '分类',
          `active` tinyint(1) DEFAULT '1' COMMENT '是否上架，1是，0否',
          `left_count` int(11) DEFAULT '0' COMMENT '库存',
          `sale_count` int(11) DEFAULT '0' COMMENT '销量',
          `eavl_count` int(11) DEFAULT '0' COMMENT '评价数',
          `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
          PRIMARY KEY (`id`),
          KEY `current_price` (`current_price`),
          KEY `goods_name` (`name`),
          KEY `sale_count` (`original_price`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='商品表'";


        foreach ($tables as $table_sql){
            $conn->exec($table_sql);
        }

        //添加默认管理员账户
        $pwd = pwd_hash('admin');
        $admin_sql = "INSERT IGNORE INTO admin SET name='admin',pwd='{$pwd}'";
        $conn->exec($admin_sql);

        //覆盖数据库配置文件
        $db_config = $this->load->view('db_config', ['db_pwd'=>$db_pwd], TRUE);
        write_file(APPPATH.'config/database.php',$db_config);
    }
}
