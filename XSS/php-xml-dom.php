<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("./note.xml");

// saveXML() 函数把内部 XML 文档放入一个字符串，这样我们就可以输出它。
print $xmlDoc->saveXML();
echo PHP_EOL;

// 我们要初始化 XML 解析器，加载 XML，并遍历 <note> 元素的所有元素：
$x = $xmlDoc->documentElement;
foreach ($x->childNodes AS $item)
{
    print $item->nodeName . " = " . $item->nodeValue . "<br>";
}
// 在上面的实例中，您看到了每个元素之间存在空的文本节点。
// 当 XML 生成时，它通常会在节点之间包含空白。
// XML DOM 解析器把它们当作普通的元素，如果您不注意它们，有时会产生问题。
?> 