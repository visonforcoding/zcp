<?php

namespace Zcp;

class HttpRequest {

    const REQUEST_TYPE = 'REQUEST_METHOD';
    const PATH_INFO = 'PATH_INFO';

    protected $server;

    public function __construct() {
        $this->server = $_SERVER;
    }

    
    /**
     * 返回http 请求类型
     * @return type
     */
    public function getRequestType() {
        return $this->server[self::REQUEST_TYPE];
    }
    
    
    public function getPathInfo(){
        if(isset($this->server[self::PATH_INFO])){
            return $this->server[self::PATH_INFO];
        }else{
            return NULL;
        }
    }

}
