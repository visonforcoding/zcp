<?php

namespace Zcp;

use Zcp\Route;
use Zcp\Model;

abstract class Controller {

    protected $route = null;
    protected $em = null;



    public function __construct() {
        $this->route = Route::getInstance();
        $model = new Model();
        $this->em = $model->getEm();
    }

    /**
     * 渲染模版 赋值给模版
     * @param type $tpl
     * @param array $data
     */
    public function render($tpl, array $data) {
        $moduleName = $this->route->getModuleName();
        $controllerName = $this->route->getControllerName();
        $viewDir = BASE_PATH . '/Apps/' . $moduleName . '/View/' . $controllerName;
        $loader = new \Twig_Loader_Filesystem($viewDir);
        $twig = new \Twig_Environment($loader, array(
            'cache' => BASE_PATH . '/Apps/' . $moduleName . '/Cache',
        ));
        echo $twig->render($tpl, $data);
    }

    public function getControllerName() {
        
    }

    /**
     * 重定向页面
     * @param type $url
     */
    public function redirect($url){
       header('Location: '.$url);
    }
}
