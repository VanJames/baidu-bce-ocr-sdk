<?php

// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://dingxiaoyu.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( dingdayu )
// +----------------------------------------------------------------------
// | Author: dingdayu 614422099@qq.com
// +----------------------------------------------------------------------
// | DATE: 2016/11/22 18:39
// +----------------------------------------------------------------------
// | Explain: 图像识别测试类
// +----------------------------------------------------------------------

class OCRTest extends PHPUnit_Framework_TestCase
{
    private $tempfile = './tests/love.png';

    /**
     * ocr图像识别测试.
     *
     * @author: dingdayu(614422099@qq.com)
     */
    public function testOcr()
    {
        $file_content = file_get_contents($this->tempfile);
        $ret = \BaiduBCE\OCR::general($file_content);
        $this->assertArrayHasKey('words_result_num', $ret, '识别错误');
        $this->assertArrayHasKey('words_result', $ret, '识别错误');
        if (isset($ret['error_code'])) {
            $this->assertEmpty($ret['error_code'], "[{$ret['error_code']}] {$ret['log_id']} {$ret['error_msg']}");
        }
    }

    /**
     * 测试环境十分支持CURL.
     *
     * @author: dingdayu(614422099@qq.com)
     */
    public function testCurl()
    {
        $this->assertTrue(function_exists('curl_init'), '环境不支持CURL');
    }
}
