<?php
/**
 * User:  ShuHao
 * Date:  2017/7/8
 */
//侧边栏导航菜单
$nav = [
    '文章管理'=>[
        '文章列表'=>'/post/index',
        '添加文章'=>'/post/add'
    ],
    '商品管理'=>[
        '商品列表'=>'/goods/index',
        '添加商品'=>'/goods/add'
    ],
    '订单管理'=>'#'
];
//current uri
$cur_page = '/'.$this->uri->segment(1, '').'/'.$this->uri->segment(2,'');
//active parent menu
$parent_nav = '';
foreach ($nav as $key => $val){
    if(is_array($val)){
        foreach ($val as $url){
            if($url == $cur_page){
                $parent_nav = $key;
                break;
            }
        }
    }else{
        if($val == $cur_page){
            $parent_nav = $key;
            break;
        }
    }
}
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FD</title>
    <link rel="stylesheet" href="<?php echo base_url('static/foundation/css/foundation.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('static/foundation/font/foundation-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('static/foundation/css/app.css'); ?>">
    <style type="text/css">
        html{
            height:100%;
        }
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            max-height: 100%;
        }
        #container{
            height:100%;
        }

        #brand{
            background-color: #286A9A;
            height: 50px;
            line-height: 50px;
        }
        #left-nav{
            color: white;
            height:100%;
            background-color: #1A2226;
        }
        .right-content,#left-nav{
            padding-left: 0;
            padding-right: 0;
        }
        #header{
            background-color: #2D78B0;
            height: 50px;
            line-height: 50px;
            color: white;
        }
        .header-a{
            color: white;
            display: block;
            text-align: center;
        }
        .header-a:hover{
            background-color: rgba(0,0,0,0.1);
        }
        #logout{
            width:50px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul a {
            text-decoration: none;
            color: white;
        }
        nav ul a:hover{
            background-color: #25272E;
        }

        #main{
            padding:0.5em;
        }
    </style>
</head>
<body>

<div class="row expanded" id="container">
    <!--side nav-->
    <div class="column small-2" id="left-nav">
        <div id="brand" class="text-center">
            <a class="header-a" href="/admin/index">三页科技</a>
        </div>
        <nav id="nav">
            <ul class="vertical menu accordion-menu" data-accordion-menu>
                <?php foreach ($nav as $key => $item): ?>
                    <?php if (is_array($item)): ?>
                        <li>
                            <a href="#"><?php echo $key; ?></a>
                            <ul class="menu vertical nested <?php echo $key == $parent_nav ? 'is-active' : ''; ?>">
                                <?php foreach ($item as $k => $v): ?>
                                    <li <?php echo $cur_page == $v ? 'class="is-active"' : ''; ?>><a href="<?php echo $v ?>" ><?php echo $k; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php else:?>
                        <li><a href="<?php echo $item; ?>"><?php echo $key; ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>

    <div class="column small-10 right-content">
        <!--header-->
        <div class="row expanded" id="header">
        <div class="column small-11"></div>
        <div class="column small-1"><a class="header-a" id="logout">退出</a></div>
        </div>
        <!--main content-->
        <div id="main">

