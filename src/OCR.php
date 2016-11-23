<?php

// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://dingxiaoyu.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( dingdayu )
// +----------------------------------------------------------------------
// | Author: dingdayu 614422099@qq.com
// +----------------------------------------------------------------------
// | DATE: 2016/11/23 09:56
// +----------------------------------------------------------------------
// | Explain: 请在这里填写说明
// +----------------------------------------------------------------------

namespace BadiduBCE;

class OCR
{
    /**
     * ocr图像识别.
     *
     * @author: dingdayu(614422099@qq.com)
     *
     * @param string $file_content 图像内容，通过file_get_contents/fopen获取
     *
     * @return mixed
     */
    public static function general($file_content = '')
    {
        $host = 'word.bj.baidubce.com';
        $path = '/api/v1/ocr/general';
        $method = 'POST';

        // 签名参数
        $palms = [];
        $timestamp = date('Y-m-d').'T'.date('H:i:s').'Z';

        //生成签名
        $Authorization = Authorization::getSigner($host, $method, $path, $palms, $timestamp);

        //要识别的测试图片(用file_get_contents获取也可以，读取也行)
        //$tempfile = "./love.png";
        //$file_content = file_get_contents($tempfile);

        //base64编码
        $encoded = base64_encode($file_content);
        //拼装头部
        $head = [
            "host:{$host}",
            "Authorization:{$Authorization}",
            "x-bce-date:{$timestamp}",
            'content-type: application/x-www-form-urlencoded',
        ];

        //编码image参数内容
        $data = 'image='.urlencode($encoded);

        $url = 'http://'.$host.$path;
        $output = HTTP::post($url, $head, $data);
        //转换成数组格式
        $result = json_decode($output, true);

        return $result;
    }

    /**
     * 身份证卡片识别.
     *
     * @author: dingdayu(614422099@qq.com)
     *
     * @param string $file_content 身份证卡片图片
     *
     * @return mixed
     */
    public static function idcard($file_content = '')
    {
        $host = 'word.bj.baidubce.com';
        $path = '/api/v1/ocr/idcard';
        $method = 'POST';

        // 签名参数
        $palms = [];
        $timestamp = date('Y-m-d').'T'.date('H:i:s').'Z';

        //生成签名
        $Authorization = Authorization::getSigner($host, $method, $path, $palms, $timestamp);

        //要识别的测试图片(用file_get_contents获取也可以，读取也行)
        //$tempfile = "./love.png";
        //$file_content = file_get_contents($tempfile);

        //base64编码
        $encoded = base64_encode($file_content);
        //拼装头部
        $head = [
            "host:{$host}",
            "Authorization:{$Authorization}",
            "x-bce-date:{$timestamp}",
            'content-type: application/x-www-form-urlencoded',
        ];

        //编码image参数内容
        $data = 'image='.urlencode($encoded);

        $url = 'http://'.$host.$path;
        $output = HTTP::post($url, $head, $data);
        //转换成数组格式并返回
        return json_decode($output, true);
    }
}
