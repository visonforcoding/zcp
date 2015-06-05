<?php

/**
 * 读取配置
 * Encoding     :   UTF-8
 * Created on   :   2015-5-24 10:05:01 by 曹文鹏 , caowenpeng1990@126.com
 */

namespace Zcp\File;

use Zcp\File\File;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Exception\ParseException;

class Config {

    protected $file = NULL;
    protected $fileExt;
    protected $filePath;

    public function __construct($filePath) {
        $this->file = new File();
        $this->filePath = $filePath;
        $this->fileExt = $this->file->getFileExt($filePath);
    }

    public function load($index=NULL) {
        switch (strtolower($this->fileExt)) {
            case 'ini':
                $adapter = 'parseIni';
                break;
            case 'yml':
                $adapter = 'parseYaml';
                break;
            default:
                break;
        }
        $config =  $this->$adapter($this->filePath);
        return empty($index)?$config:$this->getVal($config,$index);
    }

    public function parseIni($filename) {
        return parse_ini_file($filename,TRUE);
    }

    
    /**
     * 解析yaml 配置
     * @param type $filename
     * @return type
     */
    public function parseYaml($filename) {
        try {
            $yaml = new Parser();
            $value = $yaml->parse(file_get_contents($filename));
            return $value;
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }
    }
    
    public function getVal($config,$index){
        return $config[$index];
    }

}
