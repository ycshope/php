<?php
// 命名空間的作用:1.解決名字冲突 2.簡寫名字
// 命名空间必须是程序脚本的第一条语句
//创建空间Blog
namespace Blog;

// 導入命名空間
use My\Full\Classname as Another;

class Comment { }
//非限定名称，表示当前Blog空间
//这个调用将被解析成 Blog\Comment();
$blog_comment = new Comment();
//限定名称，表示相对于Blog空间
//这个调用将被解析成 Blog\Article\Comment();
$article_comment = new Article\Comment(); //类前面没有反斜杆\
//完全限定名称，表示绝对于Blog空间
//这个调用将被解析成 Blog\Comment();
$article_comment = new \Blog\Comment(); //类前面有反斜杆\
//完全限定名称，表示绝对于Blog空间
//这个调用将被解析成 Blog\Article\Comment();
$article_comment = new \Blog\Article\Comment(); //类前面有反斜杆\

//创建Blog的子空间Article
namespace Blog\Article;
class Comment { } echo MyProject\Connection::start();
?>