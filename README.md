# 在线PPT转换工具

## web2ppt

pptx 类型 MIME TYPE 参考文档

https://developer.mozilla.org/zh-CN/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Complete_list_of_MIME_types

```php
// function webToPpt($data, $type = 'pptx', $tmpfilePath='/tmp/budpptconvert.pptx')

header("Content-Type: application/vnd.openxmlformats-officedocument.presentationml.presentation");
$data = file_get_contents($webPptData);
$data = json_encode($data, true);
$convert = new PptConvert();
$pptx = $convert->webToPpt($data, 'pptx', '/tmp/budpptconvert.pptx');

$size = strlen($pptx);
$filename = 'download.pptx';

header("Content-length: $size");
header('Content-Disposition: attachment; filename="' . $filename . '"');
        
echo $pptx;
```
## ppt2web
```php
// function pptToWeb($pptPath, $type = 'pptx', $tmpfilePath='/tmp/budpptconvert/')

header("Content-Type: application/json");
$data = file_get_contents($webPptData);
$convert = new PptConvert();
$json = $convert->pptToWeb('a.pptx', 'pptx', '/tmp/budpptconvert/');
echo $json;
```
