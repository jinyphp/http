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



