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
    <title>登录</title>
    <link rel="stylesheet" href="<?php echo base_url('static/foundation/css/foundation.css'); ?>">
    <style type="text/css">
        #container{
            margin-top: 10%;
        }
        .log-in-form{
            border: 1px solid #cacaca;
            padding: 1rem;
            border-radius: 0;
        }
    </style>
</head>

<body>
<header id="header">

</header>

<main>
    <div id="container" class="row">
        <div class="column small-5 small-centered">
            <form class="log-in-form" action="/admin/login" method="POST">
                <h4 class="text-center">请 登 录</h4>
                <label>用户名
                    <input type="text" name="name" placeholder="admin">
                </label>
                <label>密码
                    <input type="password" name="pwd" placeholder="Password">
                </label>
                <p><input type="submit" class="button expanded" value="Log in"></input></p>
            </form>
        </div>
    </div>
</main>

<script src="<?php echo base_url('static/foundation/js/vendor/jquery.js');?>"></script>
<script src="<?php echo base_url('static/foundation/js/vendor/what-input.js');?>"></script>
<script src="<?php echo base_url('static/foundation/js/vendor/foundation.js');?>"></script>

</body>
</html>

