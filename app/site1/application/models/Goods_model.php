<?php
/**
 * User:  ShuHao
 * Date:  2017/3/17
 */

class Goods_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //总行数
    public function total_count(){
        return $this->db->count_all('goods');
    }

    public function get($offset = 0){
        $page_size = config_item('per_page');
        $offset = intval($offset);
        $sql = "SELECT * FROM goods LIMIT ? OFFSET ?";
        $query = $this->db->query($sql,[$page_size,$offset]);
        return $query->result_array();
    }

    //添加商品
    public function add(Array $fields){
        $sql = 'INSERT INTO goods (name,cat_id,current_price,original_price,active) VALUES (?,?,?,??)';
        $query = $this->db->query($sql,[
            $fields['name'],
            $fields['cat_id'],
            $fields['current_price'],
            $fields['original_price'],
            $fields['active']
        ]);
        return $query;
    }

    //修改商品
    public function modify(Array $fields)
    {
        $set = '';
        foreach ($fields as $key => $val){
            if($key == 'id'){continue;}
            $val = is_numeric($val) ? $val : '"'.$val.'"';
            $set .= $key.'='.$val.',';
        }
        $set = trim($set,',');
        $sql = 'UPDATE goods SET '.$set.' WHERE id='.$fields['id'];
        $query = $this->db->query($sql);
        return $query;
    }

    //删除商品
    public function del($id)
    {
        return $this->db->query('DELETE FROM goods WHERE id=?',[$id]);
    }

    //下架商品
    public function de_active($id)
    {
        return $this->db->query('UPDATE goods SET active=0 WHERE id=?',[$id]);
    }
}