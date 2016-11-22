#### 示例代码

```
$tempfile = "./love.png";
$file_content = file_get_contents($tempfile);
$ret = BaiduBceOcrSdk::ocr($file_content);
var_dump($ret);
```