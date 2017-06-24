<?php
/**
 * User:  ShuHao
 * Date:  2017/3/17
 */
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('hasLogin'))
{
    /**
     * 检查是否已经登录
     * @return bool
     */
    function hasLogin()
    {
        return isset($_SESSION['login']) && $_SESSION['login'] == 'true';
    }
}