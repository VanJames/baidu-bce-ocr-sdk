<?php

// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://dingxiaoyu.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( dingdayu )
// +----------------------------------------------------------------------
// | Author: dingdayu 614422099@qq.com
// +----------------------------------------------------------------------
// | DATE: 2016年11月25日14:23:44
// +----------------------------------------------------------------------
// | Explain: 签名测试类
// +----------------------------------------------------------------------

class AuthorizationTest extends PHPUnit_Framework_TestCase
{
    public function testSigner()
    {
        $host = 'word.bj.baidubce.com';
        $path = '/api/v1/ocr/general';
        $method = 'POST';

        // 签名参数
        $palms = [];
        $timestamp = date('Y-m-d').'T'.date('H:i:s').'Z';

        //生成签名
        $signer = \BaiduBCE\Authorization::getSigner($host, $method, $path, $palms, $timestamp);
        $this->assertNotEmpty($signer, "签名错误");
    }
}
