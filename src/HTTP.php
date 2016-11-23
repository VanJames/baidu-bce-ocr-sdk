<?php

// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://dingxiaoyu.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( dingdayu )
// +----------------------------------------------------------------------
// | Author: dingdayu 614422099@qq.com
// +----------------------------------------------------------------------
// | DATE: 2016/11/23 09:54
// +----------------------------------------------------------------------
// | Explain: 请在这里填写说明
// +----------------------------------------------------------------------

namespace BadiduBCE;

class HTTP
{
    public function __construct()
    {
        if (!function_exists('curl_init')) {
            throw new \Exception('not support curl_init', 11001);
        }
    }

    /**
     * 发起POST请求.
     *
     * @author: dingdayu(614422099@qq.com)
     *
     * @param string $url    请求URL
     * @param array  $header 请求头
     * @param string $data   post内容
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public static function post($url = '', $header = [], $data = '')
    {
        if (!$url) {
            throw new \Exception('curl: url empty!', 12101);
        }
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        $output = curl_exec($curl);
        curl_close($curl);

        return $output;
    }
}
