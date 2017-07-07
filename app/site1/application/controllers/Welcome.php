<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->view('welcome_message');
	}

	public function hello(){
        //echo config_item('composer_autoload');
        echo 'hello';
    }


    public function init_db(){
        $this->load->dbforge();
        //$this->load->database();

        //创建数据库
        //$this->dbforge->create_database('mydb');

        //创建user表
        /*$user_fields = [
            'name'=>[
                'type'=>'VARCHAR',
                'constraint'=>50
            ],
            'pwd'=>[
                'type'=>'VARCHAR',
                'constraint'=>50
            ]
        ];
        $this->dbforge->add_field('id');
        $this->dbforge->add_field($user_fields);
        $this->dbforge->create_table('user', TRUE);*/
    }
}
