<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Pagination Sections
| -------------------------------------------------------------------------
| Please see the user guide for info:
|
|	http://codeigniter.org.cn/user_guide/libraries/pagination.html
| 配合foundation样式
*/
$config['per_page'] = 20;
$config['num_links'] = 4;
$config['full_tag_open'] = '<ul class="pagination text-center" role="navigation">';
$config['full_tag_close'] = '</ul>';

$config['first_link'] = '首页';
$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['last_link'] = '末页';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="current">';
$config['cur_tag_close'] = '</li>';

$config['next_link'] = '下一页';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';

$config['prev_link'] = '上一页';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';