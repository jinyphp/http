<?php
/*
 * This file is part of the jinyPHP package.
 *
 * (c) hojinlee <infohojin@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jiny\Http;

class Http
{
    /**
     * 싱글턴 
     */
    protected static $_instance;
    public static function instance($arg=null)
    {
        if (!isset(self::$_instance)) {
            // 자기 자신의 인스턴스를 생성합니다.            
            self::$_instance = new self($arg);        
        } 
        return self::$_instance;
    }

    public $Request;
    public $Response;
    public $Endpoint;
    
    // 초기화 메서드
    public function init()
    {
        $this->Request = \Jiny\HttpRequest();
        $this->Response = \Jiny\HttpResponse();
        $this->Endpoint = \Jiny\HttpEndpoint();
        return $this;
    }

    public function callback($controller, $args=[])
    {
        $method = $this->Request->method();
        return $controller->$method($args);
    }

    /**
     * 
     */
}