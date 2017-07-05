<?php
/**
 * User:  ShuHao
 * Date:  2017/3/17
 */

class User_model extends CI_Model {

    public $name;   //用户名
    public $pwd;    //密码

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * 验证用户名和密码
     */
    public function check_pwd(){
        $pwd = $this->input->post('pwd');
        $this->pwd = md5($pwd.PWD_SALT);
        $this->name = $this->input->post('name');

        $sql = "SELECT * FROM dbtest.admin WHERE name= ? AND pwd = ?";
        $row = $this->db->query($sql,[$this->name,$this->pwd])->row();
        if($row){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}