<?php

namespace Jiny\Http;

class Request
{
    // private $headers;
    private $body;

    /**
     * 싱글턴
     */
    private static $_instance;
    public static function instance($args=null)
    {
        if (!isset(self::$_instance)) {               
            self::$_instance = new self($args); // 인스턴스 생성
            self::$_instance->init();
            return self::$_instance;
        } else {
            return self::$_instance; // 인스턴스가 중복
        }
    }
    
    private function init()
    {
        // 바디정보
        $handler = fopen('php://input', 'r');
        $this->body = stream_get_contents($handler);
    }

    public function __construct()
    {
        $this->init();
        // Request 해더 정보를 읽어 옵니다.
        /*
        $this->getHeader();

        // Request Body를 읽음
        if ($this->_headers['HTTP_CONTENT_TYPE'] == 'application/json') {
            $handler = fopen('php://input', 'r');
            $this->_request = stream_get_contents($handler);
        }
        */
    }

    public function type()
    {
        //return $this->headers['HTTP_CONTENT_TYPE'];
    }

    public function body()
    {
        return $this->body;
    }

    public function header($key)
    {
        if ($key) {
            return $_SERVER[$key];
        }
        return $_SERVER;
    }

    public function method()
    {
        // 대문자로 표기
        return strtoupper($_SERVER['REQUEST_METHOD']);
    }

}