<?php
//Initialize the XML parser
$parser=xml_parser_create();

//Function to use at the start of an element
function start($parser,$element_name,$element_attrs)
{
switch($element_name)
{
case "NOTE":
echo "-- Note --<br>";
break;
case "TO":
echo "To: ";
break;
case "FROM":
echo "From: ";
break;
case "HEADING":
echo "Heading: ";
break;
case "BODY":
echo "Message: ";
}
}

//Function to use at the end of an element
function stop($parser,$element_name)
{
echo "<br>";
}

//Function to use when finding character data
function char($parser,$data)
{
echo $data;
}

//Specify element handler
// 添加 xml_set_element_handler() 函数来定义，当解析器遇到开始和结束标签时执行哪个函数
xml_set_element_handler($parser,"start","stop");

//Specify data handler
// 添加 xml_set_character_data_handler() 函数来定义，当解析器遇到字符数据时执行哪个函数
xml_set_character_data_handler($parser,"char");

//Open XML file
$fp=fopen("test.xml","r");

//Read data
while ($data=fread($fp,4096))
{
    // 万一有错误的话，添加 xml_error_string() 函数把 XML 错误转换为文本说明
xml_parse($parser,$data,feof($fp)) or
die (sprintf("XML Error: %s at line %d",
xml_error_string(xml_get_error_code($parser)),
xml_get_current_line_number($parser)));
}

//Free the XML parser
xml_parser_free($parser);
?> 