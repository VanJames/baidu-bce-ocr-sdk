<?php
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.mocentre.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: dingdayu dingxiaoyu@mocentre.com>
// +----------------------------------------------------------------------
// | DATE: 2016/7/18 10:34
// +----------------------------------------------------------------------

class Autoloader{
    const NAMESPACE_PREFIX = 'BadiduBCE\\';
    /**
     * 向PHP注册在自动载入函数
     */
    public static function register(){
        spl_autoload_register(array(new self, 'autoload'));
    }
    /**
     * 根据类名载入所在文件
     */
    public static function autoload($className){
        $namespacePrefixStrlen = strlen(self::NAMESPACE_PREFIX);
        if(strncmp(self::NAMESPACE_PREFIX, $className, $namespacePrefixStrlen) === 0){
            $classNameArray = explode('\\',$className);
            $filePath = __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $classNameArray[1] . '.class.php';
            if(file_exists($filePath)){
                require_once $filePath;
            }
        }
    }
}

Autoloader::register();
