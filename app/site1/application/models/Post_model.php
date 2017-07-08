<?php
/**
 * User:  ShuHao
 * Date:  2017/3/17
 */

class Post_model extends CI_Model {

    public $id;         //文章id
    public $title;      //文章标题
    public $content;    //文章内容
    //public $created;    //创建时间  默认 当前时间
    //public $deleted;    //是否已删除 1删除；0不删除 默认0
    //public $sort;    //优先级 数字越大排序越靠前 默认1

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //插入文章
    public function insert()
    {
        $this->title    = $this->input->post('title');
        $this->content  = $this->input->post('content');
        $this->db->insert('post', $this);
    }

    /**
     * 获取文章
     * @param int $page_count   每页文章数量
     *
     * @return array
     */
    public function get($page_count=10)
    {
        $query = $this->db->get('post', $page_count);
        return $query->result_array();
    }

    /**
     * 获取一篇文章
     *
     * @param $pid  文章id
     *
     * @return bool
     */
    public function get_one($pid){
        $pid = empty($pid) ? $this->input->get('id') : $pid; //文章id
        if(empty($pid)){
            return FALSE;
        }
        $sql = "SELECT * FROM post WHERE id = ?";
        $row = $this->db->query($sql,[$pid])->row_array();
        return $row;
    }

    /**
     * 彻底删除文章
     */
    public function delete_one(){
        $pid = $this->input->get('id'); //文章id
        if(empty($pid)){
            return FALSE;
        }
        return $this->db->delete('post',['id'=>$pid]);
    }

    /**
     * 放入草稿箱
     */
    public function draft_one(){
        $pid = $this->input->get('id'); //文章id
        if(empty($pid)){
            return FALSE;
        }
        return $this->db->update('post',['deleted'=>1],['id'=>$pid]);
    }

    /*
     * 更新
     */
    public function update()
    {
        $this->id       = $this->input->post('id');
        $this->title    = $this->input->post('title');
        $this->content  = $this->input->post('content');
        $this->deleted  = $this->input->post('deleted');
        $this->sort     = $this->input->post('sort');

        print_r($this->input->post());
        $this->db->update('post', $this, array('id' => $this->id));
    }

    //所有文章的数量
    public function post_count(){
        return $this->db->count_all_results();
    }

    //除了删除文章的数量
    public function except_del_count(){
        $sql = "select count('id') as count from post where deleted=0";
        $query = $this->db->query($sql);

        return $query->count;
    }
}