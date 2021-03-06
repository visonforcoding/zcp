<?php

namespace Zcp;

use Zcp\HttpRequest;
use Zcp\File\Config;

class Route {

    protected $moduleName;
    protected $controllerName;
    protected $actionName;
    private static $instance;

    private function __construct() {
        $this->request = new HttpRequest();
        $this->pathInfo = $this->request->getPathInfo();
        $this->parseRoute();
    }
    
    public static function getInstance(){
        if(empty(self::$instance)){
            self::$instance = new Route();
        }
        return self::$instance;
    }

    public function parseRoute() {
        $path_arr = explode('/', $this->pathInfo);
        $path_arr_len = count($path_arr);
        $configObj = new Config(BASE_PATH . '/Config/config.yml');
        $framework_config = $configObj->load('framework');
        if ($path_arr_len >= 4) {
            $moduleName = $path_arr[1];
            $controllerName = $path_arr[2];
            $actionName = $path_arr[3];
        } elseif ($path_arr_len == 3) {
            $moduleName = $framework_config['default_moudle'];
            $controllerName = $path_arr[1];
            $actionName = $path_arr[2];
        }else{
            $moduleName = $framework_config['default_moudle'];
            $controllerName = $framework_config['default_controller'];
            $actionName = $framework_config['default_action'];
        }
        $this->moduleName = $moduleName;
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
//        return true;
    }
    
    
    public function add($param,array $regex){
        $regex_key = ['module','controller','action'];
        foreach($regex_key as $key){
            if(!array_key_exists($key, $regex_key)){
                throw new Exception;
            }
        }
    }

    /**
     * 返回模块名
     * @return type
     */
    public function getModuleName() {
        return $this->moduleName;
    }

    /**
     * 返回控制器名
     * @return type
     */
    public function getControllerName() {
        return $this->controllerName;
    }

    /**
     * 返回动作名
     * @return type
     */
    public function getActionName() {
        return $this->actionName;
    }

}
