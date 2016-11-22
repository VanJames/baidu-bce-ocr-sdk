# baidu-bce-ocr-sdk

百度云图像识别sdk（非官方）

## 使用实例

### composer 安装

### 直接下载安装

```
import "./autoload"; //  请注意此处路径
$tempfile = "./love.png";
$file_content = file_get_contents($tempfile);
$ret = BaiduBceOcrSdk::ocr($file_content);
var_dump($ret);
```


> 特别感谢`思维与逻辑`,根据官方的python改写失败后，在他的[PHP 百度图像识别接口使用示例](http://jingyan.baidu.com/article/d5a880eba64f3613f147cc90.html) 才成功，后优化改写的。
