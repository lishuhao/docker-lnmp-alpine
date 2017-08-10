<?php
/**
 * User:  ShuHao
 * Date:  2017/3/17
 */

class Category_model extends CI_Model {

    public $id;         //文章id
    public $title;      //文章标题
    public $content;    //文章内容
    private $table = 'category'; //表名

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //添加分类
    public function add_category($module,$name,$pid=0){
        $sql = "INSERT INTO {$this->table} (module,name,pid) VALUES (?,?,?)";
        return $this->db->query($sql,[$module,$name,$pid]);
    }

    //更新分类
    public function update_category($category)
    {
        $data = [
            'name'=>$category['name']
        ];
        return $this->db->update($this->table,$data,['id'=>$category['id']]);
    }

    //获取分类
    public function get_category($category_id){
        $sql = "select * from {$this->table} where  id=? LIMIT 1";
        $query = $this->db->query($sql,[$category_id]);
        return $query->row_array();
    }

    //删除分类
    public function delete_category($id){
        return 1;
        //return $this->db->delete($this->table,['id'=>$id]);
    }

    //获取直接子分类
    public function get_children($pid)
    {
        $sql = "select * from {$this->table} where  pid=?";
        $query = $this->db->query($sql,[$pid]);
        return $query->result_array();
    }

    //递归获取模块下所有的分类
    public function module_category($module){
        return $this->list_process($module);
    }

    //为每一个分类条目添加has_son字段
    private function list_process($module){
        $res = $this->get_list($module);
        foreach ($res as $index => &$item){
            if($index == 0){
                continue;
            }
            if(substr_count($item['name'],'&nbsp;') > substr_count($res[$index -1]['name'],'&nbsp;')){
                $res[$index -1]['has_son'] = 1;
            }else{
                $res[$index -1]['has_son'] = 0;
            }
        }
        $res[count($res) -1]['has_son'] = 0;

        return $res;
    }
    //获取某个模块下的分类
    private function get_list($module,$pid = 0,&$result = array(),$space = 0){
        $space += 1;
        $sql = "select * from {$this->table} where module=? AND pid=?";
        $query = $this->db->query($sql,[$module,$pid]);
        $res = $query->result_array();
        foreach ($res as $item) {
            $item['name'] = str_repeat('&nbsp;', $space).$item['name'];
            $result[] = $item;
            $this->get_list($module,$item['id'],$result,$space);
        }
        return $result;
    }

    //获取所有模块
    public function all_module()
    {
        $sql = "SELECT DISTINCT module FROM {$this->table}";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}