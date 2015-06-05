<?php

/**
* Encoding     :   UTF-8
* Created on   :   2015-5-24 17:31:05 by 曹文鹏 , caowenpeng1990@126.com
*/
namespace Zcp;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Zcp\File\Config;
class Model{
    
    protected static $entityManager;
    public function __construct($path=null,$param=NULL) {
        if(!isset(self::$entityManager)){
            $isDevMode = false;
            // $configObj = \Zcp\Bootstrap::getConfig();
            $configFile = BASE_PATH.'/config/config.yml';
            $configObj = new Config($configFile);
            $dbConfig = $configObj->load('database');
            if(empty($path)){
                $path = BASE_PATH.'/'.$dbConfig['entityDir'];
                $param = $dbConfig['dbparam'];
            }
            $config = Setup::createAnnotationMetadataConfiguration(array($path), $isDevMode);
            $entityManager = EntityManager::create($param, $config);
            self::$entityManager = $entityManager;
        }
    }
    
    public function getEm(){
        return self::$entityManager;
    }
}