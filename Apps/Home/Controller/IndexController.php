<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2015-5-24 0:28:44 by 曹文鹏 , caowenpeng1990@126.com
 */

namespace Apps\Home\Controller;

use Zcp\Controller;
use Utils\HttpClient;
use Entity\Product;

class IndexController extends Controller {

    public function index() {
        $testDoctrine = false;
        if ($testDoctrine) {
            $product = new Product();
            $product->setName('cwp');
            $this->em->persist($product);
            $this->em->flush();
            if ($product->getId()) {
                echo '插入成功！';
            } else {
                echo '插入失败！';
            }
        }
        $this->render('index.twig', array(
            'title' => '测试'
        ));
    }

    public function test() {
       $weixin_sdk = new \Utils\Weixin\WeixinSdk('wxf8e8d24261e6eeda', 'be618cb4325c31af7346e137224f6e04');
       $weixin_sdk->getAccessToken();
    }

}
