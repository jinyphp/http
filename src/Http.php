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

    
    
    
    
    // 초기화 메서드
    public function init()
    {
        $this->request();
        $this->response();
        $this->endpoint();
        return $this;
    }

    public $Endpoint;
    public function endpoint()
    {
        if (!$this->Endpoint) {
            $this->Endpoint = \Jiny\HttpEndpoint();
        }
        return $this->Endpoint;
    }

    public $Request;
    public function request()
    {
        if (!$this->Request) {
            $this->Request = \Jiny\HttpRequest();
        }
        return $this->Request;
    }

    public $Response;
    public function response()
    {
        if (!$this->Response) {
            $this->Response = \Jiny\HttpResponse();
        }
        return $this->Response;
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