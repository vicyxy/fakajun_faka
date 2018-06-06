<?php
/**
 * 发卡君SDK文件
 * @link   (fakajun, https://www.fakajun.com)
 * @author lidangao <ilidangao@gmail.com>
 */

// 定义时间编码
date_default_timezone_set('PRC');
header("Content-type: text/html; charset=utf-8");

class fakajun
{
    /**
     * Http请求
     * @param  array $params 请求参数
     * @return json         返回数据
     */
    public static function http($params = array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.fakajun.com/gateway.do');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        $res = curl_exec($ch);
        return $res;
    }

    /**
     * 签名算法
     * @param  array $params     请求参数
     * @param  string $app_key AppKey
     * @return string             签名字符串
     */
    public static function sign($params, $app_key)
    {
        $para_filter = array();
        while (list ($key, $val) = each ($params)) {
            if($key == "sign" || $key == "sign_type" || $val == "")continue;
            else    $para_filter[$key] = $params[$key];
        }

        ksort($para_filter);
        reset($para_filter);

        $arg  = "";

        while (list ($key, $val) = each ($para_filter)) {
            // 不是数组的时候才会组合，否则传入数组会出错
            if (!is_array($val)) {
                $arg.=$key."=".$val."&";
            }
        }

        //去掉最后一个&字符
        $arg = substr($arg,0,count($arg)-2);
        //如果存在转义字符，那么去掉转义
        if(get_magic_quotes_gpc()){
            $arg = stripslashes($arg);
        }

        $string = $arg . $app_key;

        // md5签名
        return strtoupper(md5($string));
    }

    /**
     * 判断是否是手机设备
     */
    public static function mobile() {
         static $is_mobile = null;
         if ( isset( $is_mobile ) ) {
          return $is_mobile;
         }
          
         if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
          $is_mobile = false;
         } elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // many mobile devices (all iPhone, iPad, etc.)
          || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
          || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
          || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
          || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
          || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
          || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {
           $is_mobile = true;
         } else {
          $is_mobile = false;
         }
          
         return $is_mobile;
    }

    public static function ip()
    {
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
        } elseif (getenv('REMOTE_ADDR')) {
            $ip = getenv('REMOTE_ADDR');
        } else {
            $ip = '127.0.0.1';
        }
        return $ip;
    }

}