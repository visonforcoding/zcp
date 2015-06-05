<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-5-24 19:08:03 by 曹文鹏 , caowenpeng1990@126.com
 */
use Doctrine\ORM\Tools\Console\ConsoleRunner;

define('BASE_PATH', dirname(__FILE__));
require_once './Zcp/AutoLoader.php';
Zcp\AutoLoader::load();
$Model = new Zcp\Model();

// replace with mechanism to retrieve EntityManager in your app
$entityManager = $Model->getEm();

return ConsoleRunner::createHelperSet($entityManager);
