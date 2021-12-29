
<?php
// SimpleXML 扩展提供了一种获取 XML 元素的名称和文本的简单方式。
// 与 DOM 或 Expat 解析器相比，SimpleXML 仅仅用几行代码就可以从 XML 元素中读取文本数据。
$xml=simplexml_load_file("note.xml");
print_r($xml);
echo "<br>";

#元素便利
$xml=simplexml_load_file("note.xml");
echo $xml->to . "<br>";
echo $xml->from . "<br>";
echo $xml->heading . "<br>";
echo $xml->body;

?>
