<?php
/**
 * interface && abstract class 理解
 */
/**
 * Interface Demo 知识点理解
 * 1，interface里所有的方法都必须为abstract(抽象)方法且abstract必须省略
 * 2，interface里所有的方法的修饰词必须为public或者省略
 * 3，interface里面的方法必须没有方法体部分
 * 4，interface不能直接实例化，如果要使用interface必须先进行引用
 * 5，interface可以进行多个引用 如果一个class要使用两个接口 demo & demo1 使用方式如下
 * abstract class XXXX implements demo      // 如果要引用interface 则此类必须是抽象（abstract）类
 * 6，interface里不可以定义属性
 * 7，interface里面的引用可以是多引用
 * 8，在abstract class中引用过interface后，没有必要直接实现其中的方法，完全可以在abstract class的子类中实现！
 */
interface demo{
    public function func1();    // public 可以省略
    public function sayTest();  // public 可以省略
    function hello();
}
interface demo1{
    public function sayHi();	// public 可以省略
    public function sayWorld();	// public 可以省略
    public function sayAge();	// public 可以省略
}

interface demo2{
    public function sayDemo();	// public 可以省略
}

/**
 * 抽象类的知识点理解
 * 1，类中必须有abstract method(抽象方法)
 * 2，继承的时候必须是单一的继承和普通的继承方式基本一样
 * 3，继承和引用的顺序是 先继承后引用
 * 4，继承和引用的量的限制 单继承多引用
 * 5，抽象类没有必要实现所有的抽象方法
 * 6，非抽象类型的子类必须实现抽象类型的父类的所有的抽象方法
 * 7，继承和引用可以并存
 */
abstract class cms implements demo,demo1{		//继承和引用并存 单继承多引用 先继承后引用
//    实现了接口中的一个方法func1
    public function func1(){
        echo "func1";
    }
	// 有人觉得这里没有抽象方法 这里其实有抽象方法的 抽象方法存在于 demo && demo1 这两个接口中
}

abstract class crm extends cms implements demo2{

}

class finalB extends cms{
	// 非抽象类型的子类必须实现抽象类型的父类的所有的抽象方法
    function sayHi(){
        echo 'Hi';
    }
    function sayWorld(){
        echo 'World!';
    }
    function sayAge(){
        echo 'Age';
    }
    function sayTest(){
        echo "Test";
    }
    function hello(){
        echo "Hello";
    }
}

$fin=new finalB();
$fin->func1();
echo '<br>';
$fin->sayTest();
echo '<br>';
$fin->hello();
echo '<br>';

//$a=new Demo;              // SyntaxError 不能直接实例化
//$a->sayTest();            // 同上