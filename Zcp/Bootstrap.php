<?php

namespace Zcp;

use Zcp\Route;
use Zcp\HttpRequest;
use Zcp\File\Config;

final class Bootstrap {

    protected $request;
    protected $pathInfo;
    protected $route;
    protected static $config;
    protected $em;

    public function __construct() {
        $this->route = Route::getInstance();
        $this->registryService();
    }

    public function start() {
        //路由
        error_reporting(0);
        set_error_handler(function($errno, $errstr, $errfile, $errline) {
            var_dump($errno, $errstr, $errfile, $errline);
        });
      
        register_shutdown_function(function() {
            $last_error = error_get_last();
            if (isset($last_error)) {
                echo "错误信息：",$last_error['message'], "</br>";
                echo " File=", $last_error['file'], "</br>";
                echo " Line=", $last_error['line'], "</br>";
                debug_print_backtrace();
            }
        });
        set_exception_handler(function(\Exception $exception) {
            echo get_class($exception), ": ", $exception->getMessage(), "</br>";
            echo " File=", $exception->getFile(), "</br>";
            echo " Line=", $exception->getLine(), "</br>";
            echo $exception->getTraceAsString();
        });
        $moduleName = $this->route->getModuleName();
        $controllerName = $this->route->getControllerName();
        $actionName = $this->route->getActionName();
        $controllerClassName = '\\Apps\\' . $moduleName . '\\' . 'Controller\\' . $controllerName . 'Controller';
        $controller = new $controllerClassName();
        $controller->$actionName();
    }

    public function registryService() {
        self::$config = new Config(BASE_PATH . '/Config/config.yml');
    }

    public static function getConfig() {
        return self::$config;
    }

    public function setEm() {
//读取配置
        $configAdapter = new Config(BASE_PATH . '/Config/config.yml');
        $config = $configAdapter->load('database');
    }

    public function appErrorHandler() {
        
    }

}
