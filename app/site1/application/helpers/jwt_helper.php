<?php
/**
 * User:  ShuHao
 * Date:  2017/3/17
 */
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

//=------------admin-------------
//检查是否已登录
if ( ! function_exists('check_login'))
{
    /**
     * 检查是否已经登录
     *
     * @param $role admin/user
     *
     * @return mixed
     */
    function check_login($role)
    {
        $cookie_name = $role == 'admin' ? config_item('admin_cookie') : config_item('user_cookie');
        $jwt = get_instance()->input->cookie($cookie_name);
        if(empty($jwt)){
            return FALSE;
        }
        JWT::$leeway = 60;
        try {
            $decoded = JWT::decode($jwt,config_item('jwt_key'),array('HS256'));
            if($decoded->role != $role){
                return false;
            }
        }catch (Exception $e){
            log_message('error',$e->getMessage());
            return FALSE;
        }
        return $decoded;
    }
}

//判断管理员登录
function check_admin_login(){
    return check_login('admin');
}
//判断普通用户前台登录
function check_user_login(){
    return check_login('user');
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
        $decoded_jwt->exp = time() + config_item('jwt_exp');
        return JWT::encode($decoded_jwt,config_item('jwt_key'));
    }
}

if ( ! function_exists('gen_jwt'))
{
    /**
     * 检查是否已经登录
     *
     * @param $payload
     *
     * @return string
     * @internal param $name
     * @internal param object $decoded_jwt
     */
    function gen_jwt($payload)
    {
        if(!is_array($payload)){
            return FALSE;
        }
        $now = time();
        $exp = config_item('jwt_exp');
        $token = [
            'iat' => $now,
            'exp' => $now + $exp,
            'nbf' => $now - $exp
        ];
        $token = array_merge($token,$payload);
        $jwt = JWT::encode($token, config_item('jwt_key'));
        return $jwt;
    }
}

//=----------------front---------------