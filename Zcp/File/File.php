<?php

/**
 * 文件相关
 * Encoding     :   UTF-8
 * Created on   :   2015-5-24 10:07:28 by 曹文鹏 , caowenpeng1990@126.com
 */

namespace Zcp\File;

class File {

    /**
     * 获取文件后缀名
     * @param type $fileName
     * @return type
     */
    public function getFileExt($fileName) {
        $nameArr = explode('.', $fileName);
        $length = count($nameArr) - 1;
        return $nameArr[$length];
    }

}
