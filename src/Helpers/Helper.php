<?php
/*
 * This file is part of the jinyPHP package.
 *
 * (c) hojinlee <infohojin@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace jiny;

/**
 * 싱글턴
 * http 패키지 인스턴스 반환
 */
if (! function_exists('http')) {
    function http($args=null) {
        $obj = \Jiny\Http\Http::instance();
        return $obj->init();
    }
}

if (!function_exists("httpRequest")) {
    function httpRequest()
    {
        return \Jiny\Http\Request::instance();
    }
}

if (!function_exists("httpResponse")) {
    function httpResponse()
    {
        $res = \Jiny\Http\Response::instance();
        //$res->setBody($body);
        return $res;
    }
}

if (!function_exists("httpEndpoint")) {
    function httpEndpoint()
    {
        return \Jiny\Http\Endpoint::instance();
    }
}

// 페이지 이동
if (! function_exists('redirect')) {
    function redirect($url) {
        header("location:".$url);
    }
}


/**
 *  폼데이터
 */

function formData($key=null)
{
    if($key) {
        if(isset($_POST['data'][$key])) return $_POST['data'][$key];
    } else {
        // 배열
        if(isset($_POST['data'])) return $_POST['data'];
    }
    return [];
}

function formPOST($key=null)
{
    if($key) {
        return $_POST[$key];
    } else {
        // 배열
        return $_POST;
    }
}

function formGET($key=null)
{
    if($key) {
        return $_GET[$key];
    } else {
        // 배열
        return $_GET;
    }
}


namespace jiny\http;

if (!function_exists("request")) {
    function request()
    {
        return \Jiny\Http\Request::instance();
    }
}

if (!function_exists("response")) {
    function response()
    {
        return \Jiny\Http\Response::instance();
    }
}

if (!function_exists("endpoint")) {
    function endpoint()
    {
        return \Jiny\Http\Endpoint::instance();
    }
}