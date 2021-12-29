<?php
// 多态 − 多态性是指相同的函数或方法可作用于多种类型的对象上并获得不同的结果。不同的对象，收到同一消息可以产生不同的结果，这种现象称为多态性。
// 重载 − 简单说，就是函数或者方法有同样的名称，但是参数列表不相同的情形，这样的同名不同参数的函数或者方法之间，互相称之为重载函数或者方法。
// 抽象性 − 抽象性是指将具有一致的数据结构（属性）和行为（操作）的对象抽象成类。一个类就是这样一种抽象，它反映了与应用有关的重要性质，而忽略其他一些无关内容。任何类的划分都是主观的，但必须与具体的应用有关。
class Site {
/* 成员变量 */
  var $url;
  var $title;

    //   構造函數
  function __construct( $par1, $par2 ) {
    $this->url = $par1;
    $this->title = $par2;
  }

  // 析構函數
  function __destruct() {
    print "销毁 " . $this->name . "\n";
  }

  /* 成员函数 */
  function setUrl($par){
     $this->url = $par;
  }
  
  function getUrl(){
     echo $this->url . PHP_EOL;
  }
  
  // 声明一个公有的方法(default)
  public function MyPublic() { }

  // 声明一个受保护的方法,子類無法訪問
  protected function MyProtected() { }

  // 声明一个私有的方法,子類無法訪問
  private function MyPrivate() { }

  //  如果父类中的方法被声明为 final，则子类无法覆盖该方法。如果一个类被声明为 final，则不能被继承
  final public function moreTesting() {
    echo "BaseClass::moreTesting() called"  . PHP_EOL;
    }
}

// 創建實例
$runoob = new Site('www.runoob.com', '菜鸟教程');

// 调用成员函数，获取URL
$runoob->getUrl();


//繼承
// 子类扩展站点类别
class Child_Site extends Site {
    var $category;

    function __construct() {
        parent::__construct();  // 子类构造方法不能自动调用父类的构造方法
        print "SubClass 类中构造方法" . PHP_EOL;
    }

     function setCate($par){
         $this->category = $par;
     }
   
     //重寫父類的方法
     function getUrl() {
        echo $this->url . PHP_EOL;
        return $this->url;
     }

     //声明类属性或方法为 static(静态)，就可以不实例化类而直接访问。
    public static $my_static = 'foo';

    public function staticValue() {
        return self::$my_static;
     }

    // 可以对 public 和 protected 进行重定义，但 private 而不能
     //抽象类

}

$taobao = new Child_Site('www.taobao.com', '淘寶');
$taobao->MyPublic(); //public可以繼承
// $taobao->MyProtected() 不能繼承父屬性
// $taobao->MyPrivate() 不能繼承父屬性


//調用static方法
print Child_Site::$my_static . PHP_EOL;

// 声明一个'iTemplate'接口
interface iTemplate
{
    public function setVariable($name, $var);
    public function getHtml($template);
}


// 接口
// 使用接口（interface），可以指定某个类必须实现哪些方法，但不需要定义这些方法的具体内容。 
// 实现接口
class Template implements iTemplate
{
    private $vars = array();
  
    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
  
    public function getHtml($template)
    {
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }
 
        return $template;
    }
}


// 抽象类
// 任何一个类，如果它里面至少有一个方法是被声明为抽象的，那么这个类就必须被声明为抽象的。
// 定义为抽象的类不能被实例化。
abstract class AbstractClass
{
 // 强制要求子类定义这些方法
    abstract protected function getValue();
    abstract protected function prefixValue($prefix);

    // 普通方法（非抽象方法）
    public function printOut() {
        print $this->getValue() . PHP_EOL;
    }
}

class ConcreteClass1 extends AbstractClass
{
    protected function getValue() {
        return "ConcreteClass1";
    }

    public function prefixValue($prefix) {
        return "{$prefix}ConcreteClass1";
    }
}

class ConcreteClass2 extends AbstractClass
{
    public function getValue() {
        return "ConcreteClass2";
    }

    public function prefixValue($prefix) {
        return "{$prefix}ConcreteClass2";
    }
}

$class1 = new ConcreteClass1;
$class1->printOut();
echo $class1->prefixValue('FOO_') . PHP_EOL;


// Final 关键字
// PHP 5 新增了一个 final 关键字。
// 如果父类中的方法被声明为 final，则子类无法覆盖该方法。如果一个类被声明为 final，则不能被继承。

class BaseClass {
  public function test() {
      echo "BaseClass::test() called" . PHP_EOL;
  }
  
  final public function moreTesting() {
      echo "BaseClass::moreTesting() called"  . PHP_EOL;
  }
}

class ChildClass extends BaseClass {

  // 报错信息 Fatal error: Cannot override final method BaseClass::moreTesting()
  // public function moreTesting() {
  //     echo "ChildClass::moreTesting() called"  . PHP_EOL;
  // }
}
?>