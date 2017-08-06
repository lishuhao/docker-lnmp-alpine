<?php
/**
 * User:  ShuHao
 * Date:  2017/3/17
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * PHP DES 加密程式
 * 摘自 http://blog.toright.com/posts/2657/ios-objective-c-與-php-des-加解密演算法實作.html
 * 三个平台共用 一个密匙，尽量为8或8的倍数
 * @param $encrypt //要加密的明文
 * @return string 密文
 */
function des_encrypt ($encrypt)
{

    $key = substr(PWD_SALT,0,8);
    // 根據 PKCS#7 RFC 5652 Cryptographic Message Syntax (CMS) 修正 Message 加入 Padding
    $block = mcrypt_get_block_size(MCRYPT_DES, MCRYPT_MODE_ECB);
    $pad = $block - (strlen($encrypt) % $block);
    $encrypt .= str_repeat(chr($pad), $pad);

    // 不需要設定 IV 進行加密
    $passcrypt = mcrypt_encrypt(MCRYPT_DES, $key, $encrypt, MCRYPT_MODE_ECB);
    return base64_encode($passcrypt);
}

/**
 * PHP DES 解密程式
 *
 * @param $decrypt string 要解密的密文
 * @return string 明文
 */
function des_decrypt ($decrypt)
{
    $key = substr(PWD_SALT,0,8);
    // 不需要設定 IV
    $str = mcrypt_decrypt(MCRYPT_DES, $key, base64_decode($decrypt), MCRYPT_MODE_ECB);

    // 根據 PKCS#7 RFC 5652 Cryptographic Message Syntax (CMS) 修正 Message 移除 Padding
    $pad = ord($str[strlen($str) - 1]);
    return substr($str, 0, strlen($str) - $pad);
}

//密码hash
function pwd_hash($pwd){
    return sha1($pwd.PWD_SALT);
}
