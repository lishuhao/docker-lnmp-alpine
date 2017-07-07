<?php
/**
 * User:  ShuHao
 * Date:  2017/3/17
 */
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

//检查是否已登录
if ( ! function_exists('check_login'))
{
    /**
     * 检查是否已经登录
     *
     * @param string $jwt
     *
     * @return mixed
     */
    function check_login($jwt)
    {
        if(empty($jwt)){
            return FALSE;
        }
        JWT::$leeway = 60;
        try {
            $decoded = JWT::decode($jwt,config_item('jwt_key'),array('HS256'));
        }catch (Exception $e){
            print_r($e->getMessage());
            return FALSE;
        }
        return $decoded;
    }
}

//更新cookie jwt 过期时间
if ( ! function_exists('update_login_cookie'))
{
    /**
     * 检查是否已经登录
     *
     * @param object $decoded_jwt
     *
     * @return string
     */
    function update_login_cookie($decoded_jwt)
    {
        //print_r($decoded_jwt);
        $decoded_jwt->exp = time() + config_item('jwt_exp');
        return JWT::encode($decoded_jwt,config_item('jwt_key'));
    }
}

if ( ! function_exists('gen_jwt'))
{
    /**
     * 检查是否已经登录
     *
     * @param $name
     *
     * @return string
     * @internal param object $decoded_jwt
     */
    function gen_jwt($name)
    {
        $token = [
            //"iss" => "http://example.org",
            //"aud" => "http://example.com",
            "iat" => 1356999524,
            "nbf" => 1357000000,
            'name'=> $name
        ];

        $jwt = JWT::encode($token, config_item('jwt_key'));
        return $jwt;
    }
}