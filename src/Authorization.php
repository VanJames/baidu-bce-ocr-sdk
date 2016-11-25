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

namespace BaiduBCE;

class Authorization
{
    /**
     * @var string key
     */
    protected static $AK = '037aaa7164814b22826e39d48cbec394';

    /**
     * @var string 秘钥
     */
    protected static $SK = 'b53d1bd54d044365b06f2afc9a11a45f';

    /**
     * BaiduBceOcrSdk constructor.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        date_default_timezone_set('UTC');
    }

    /**
     * 检查url是否/开头，不是则补上.
     *
     * @author: dingdayu(614422099@qq.com)
     *
     * @param string $path url路径
     *
     * @return mixed|string
     */
    public static function getCanonicalURIPath($path = '')
    {
        //空路径设置为'/'
        if (empty($path)) {
            return '/';
        } else {
            //所有的uri必须以'/'开头
            if ($path[0] === '/') {
                return self::urlEncodeExceptSlash($path);
            } else {
                return '/'.self::urlEncodeExceptSlash($path);
            }
        }
    }

    /**
     * 将url路径 urlencode 然后将 %2F 反替换为 /.
     *
     * @author: dingdayu(614422099@qq.com)
     *
     * @param string $path url路径
     *
     * @return mixed
     */
    public static function urlEncodeExceptSlash($path = '')
    {
        return str_replace('%2F', '/', urlencode($path));
    }

    /**
     * 计算签文.
     *
     * @author: dingdayu(614422099@qq.com)
     *
     * @param string $host       请求的域名
     * @param string $httpMethod 请求类型：POST/GET
     * @param string $path       请求url路径
     * @param string $header     Heard请求头
     * @param string $timestamp  UTC时间
     *
     * @return string
     */
    public static function getSigner($host = '', $httpMethod = '', $path = '', $header = '', $timestamp = '')
    {
        $expirationPeriodInSeconds = '3600';
        $authStringPrefix = 'bce-auth-v1/'.self::$AK."/{$timestamp}/{$expirationPeriodInSeconds}";
        $SigningKey = hash_hmac('SHA256', $authStringPrefix, self::$SK);
        $CanonicalHeaders1 = 'host;x-bce-date';
        $CanonicalHeaders2 = "host:{$host}\nx-bce-date:".urlencode($timestamp);
        $CanonicalString = self::getCanonicalQueryString($header);
        $CanonicalURI = $path;
        $Method = $httpMethod;
        $CanonicalRequest = "{$Method}\n{$CanonicalURI}\n{$CanonicalString}\n{$CanonicalHeaders2}";
        $Signature = hash_hmac('SHA256', $CanonicalRequest, $SigningKey);
        $Authorization = 'bce-auth-v1/'.self::$AK."/{$timestamp}/{$expirationPeriodInSeconds}/{$CanonicalHeaders1}/{$Signature}";

        return $Authorization;
    }

    /**
     * 生成标准化参数.
     *
     * @author: dingdayu(614422099@qq.com)
     *
     * @param array $parameters
     *
     * @return string
     */
    public static function getCanonicalQueryString(array $parameters)
    {
        //没有参数，直接返回空串
        if (count($parameters) === 0) {
            return '';
        }
        $parameterStrings = [];
        foreach ($parameters as $k => $v) {
            //跳过Authorization字段
            if (strcasecmp('Authorization', $k) === 0) {
                continue;
            }
            if (!isset($k)) {
                throw new \InvalidArgumentException('parameter key should not be null');
            }
            if (isset($v)) {
                //对于有值的，编码后放在=号两边
                $parameterStrings[] = urlencode($k).'='.urlencode((string) $v);
            } else {
                //对于没有值的，只将key编码后放在=号的左边，右边留空
                $parameterStrings[] = urlencode($k).'=';
            }
        }
        //按照字典序排序
        sort($parameterStrings);
        //使用'&'符号连接它们
        return implode('&', $parameterStrings);
    }
}
