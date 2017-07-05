<?php
/**
 * User:  ShuHao
 * Date:  2017/3/17
 */
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('css_tag'))
{
    /**
     * 检查是否已经登录
     * @return bool
     */
    function css_tag($css)
    {
        if(empty($css)){
            return;
        }

        if(is_string($css)){
            printf('<link href="%s" rel="stylesheet" type="text/css" />',$css);
        }
        if(is_array($css)){
            foreach ($css as $item){
                printf('<link href="%s" rel="stylesheet" type="text/css" />',$item);
            }
        }
        return;
    }
}

if ( ! function_exists('js_tag'))
{
    /**
     * 检查是否已经登录
     * @return bool
     */
    function js_tag($js)
    {
        if(empty($js)){
            return;
        }

        if(is_string($js)){
            printf('<script src="%s"></script>',$js);
        }
        if(is_array($js)){
            foreach ($js as $item){
                printf('<script src="%s"></script>',$item);
            }
        }
        return;
    }
}