<?php
/**
 * User:  ShuHao
 * Date:  2017/7/8
 */
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
            overflow: hidden;
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
        #logout{
            color: white;
            display: inline-block;
            width:50px;
            text-align: center;
        }
        #logout:hover{
            background-color: rgba(0,0,0,0.1);
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
            三页科技
        </div>
        <nav id="nav">
            <ul class="vertical menu accordion-menu" data-accordion-menu>
                <li>
                    <a href="#">文章管理</a>
                    <ul class="menu vertical nested">
                        <li><a href="/post/index">文章列表</a></li>
                        <li><a href="/post/add">添加文章</a></li>
                    </ul>
                </li>
                <li><a href="#">订单管理</a></li>
            </ul>
        </nav>
    </div>

    <div class="column small-10 right-content">
        <!--header-->
        <div class="row expanded" id="header">
        <div class="column small-11"></div>
        <div class="column small-1"><a id="logout">退出</a></div>
        </div>
        <!--main content-->
        <div class="row expanded" id="main">

