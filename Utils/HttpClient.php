<?php

namespace Utils;

class HttpClient {

    public function __construct() {
        
    }

    public function request($url, $type = 'get', $data = array()) {
        // 创建一个新cURL资源
        $ch = curl_init();
        // 设置URL和相应的选项
        $type = strtoupper($type);
        $ssl = substr($url, 0, 8) == "https://" ? TRUE : FALSE;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if (!empty($data)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        if ($ssl) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        // 抓取URL并把它传递给浏览器
        $response = curl_exec($ch);
        //关闭cURL资源，并且释放系统资源
        curl_close($ch);
        return $response;
    }

}
