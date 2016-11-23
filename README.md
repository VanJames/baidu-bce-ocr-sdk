# baidu-bce-ocr-sdk

百度云图像识别sdk（非官方）

<p align="center">
<a href="https://travis-ci.org/dingdayu/baidu-bce-ocr-sdk"><img src="https://travis-ci.org/dingdayu/baidu-bce-ocr-sdk.svg?branch=master" alt="Build Status"></a>
<a href="https://packagist.org/packages/dingdayu/baidu-bce-ocr-sdk"><img src="https://poser.pugx.org/dingdayu/baidu-bce-ocr-sdk/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/dingdayu/baidu-bce-ocr-sdk"><img src="https://poser.pugx.org/dingdayu/baidu-bce-ocr-sdk/v/unstable.svg" alt="Latest Unstable Version"></a>
<a href="https://scrutinizer-ci.com/g/overtrue/wechat/build-status/master"><img src="https://scrutinizer-ci.com/g/overtrue/wechat/badges/build.png?b=master" alt="Build Status"></a>
<a href="https://scrutinizer-ci.com/g/overtrue/wechat/?branch=master"><img src="https://scrutinizer-ci.com/g/overtrue/wechat/badges/quality-score.png?b=master" alt="Scrutinizer Code Quality"></a>
<a href="https://scrutinizer-ci.com/g/overtrue/wechat/?branch=master"><img src="https://scrutinizer-ci.com/g/overtrue/wechat/badges/coverage.png?b=master" alt="Code Coverage"></a>
<a href="https://packagist.org/packages/dingdayu/baidu-bce-ocr-sdk"><img src="https://poser.pugx.org/dingdayu/baidu-bce-ocr-sdk/downloads" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/dingdayu/baidu-bce-ocr-sdk"><img src="https://poser.pugx.org/dingdayu/baidu-bce-ocr-sdk/license" alt="License"></a>
</p>

## 使用实例

### composer 安装

```
composer require dingdayu/baidu-bce-ocr-sdk
```

然后引用

```
require "./vendor/autoload.php";
date_default_timezone_set('UTC');

$tempfile = "./love.png";
$file_content = file_get_contents($tempfile);
$ret = \BadiduBCE\OCR::general($file_content);
var_dump($ret);
```

### 直接下载安装

> 前往 [releases](https://github.com/dingdayu/baidu-bce-ocr-sdk/releases) 下载最新版，并移动到对应位置！

```
require "./vendor/dingdayu/baidu-bce-ocr-sdk/autoload.php"; // 注意替换此处路径
date_default_timezone_set('UTC'); // 设置当前时区为UTC

$tempfile = "./love.png";
$file_content = file_get_contents($tempfile); // 读取文件，另可用fopen
$ret = \BadiduBCE\OCR::general($file_content);
var_dump($ret);
```

### 特别感谢

> 特别感谢`思维与逻辑`,根据官方的python改写失败后，在他的[PHP 百度图像识别接口使用示例](http://jingyan.baidu.com/article/d5a880eba64f3613f147cc90.html) 才成功，后优化改写的。
