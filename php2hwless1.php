<?php
/*1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: товар
2. Описать свойства класса из п.1 (состояние).
3. Описать поведение класса из п.1 (методы).
4. Придумать наследников класса из п.1. Чем они будут отличаться?*/


class Product { 
    //делаем общий класс


    private $id;
    private $name;
    private $price;
    private $description;
    private $photo;

    //protected доступен из наследников
    //private - внутри класса

    public function render(){
        echo "<p>{$this->id}</p>";
        echo "<p>{$this->name}</p>";
        echo "<p>{$this->price}$</p>";
        
        //пусть тут условно рендерится карточка товара 
        //и отправляется запрос в бд
    }

    public function addToCart(){
        echo "<p>{$this->name} добавили в корзину</p>";
    }

    public function addWishlist(){
        //добавить в лист ожидания
    }

    protected function __construct( int $id, string $name, int $price, string $description, string $photo){
        
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->photo = $photo;
    }



}


final class Clothes extends Product {
    //пусть это будет финальный класс, если магазин в стиле "все подряд" 
    //то от Product можно сделать еще наследников типа батареек, 
    //которые например нельзя оформлять доставкой по почте,
    
   private $size;
   private $color;
    
   public function __construct(int $id, string $name, int $price, string $description, string $photo, array $size, array $color)
   {
    parent::__construct( $id, $name, $price, $description, $photo);
    $this->size = $size;
    $this->color = $color;
    
   }

   public function chooseSize(){
       echo "<p>{$this->size[0]}</p>";
   }
   public function chooseColor(){
        echo "<p>{$this->color[0]}</p>";
   }

}



/*

//5. Дан код:
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}

class B extends A{

}

$a1 = new A();
$a2 = new A();

$a1->foo(); //1
$a2->foo(); //2
$a1->foo(); //3
$a2->foo(); //4


//переменная $x будет проинициализирована при первом вызове функции
//и при дальнейших вызовах она будет прибавлять к себе 1
//при каждом вызове функция обращается к одному и тому же методу класса А,
//тк методы не дублируются при создании нового объекта,
//  будет использован один и тот же $x
//если сделать наследованый класс, то будет новый $x;
  



//Что он выведет на каждом шаге? Почему?
//Немного изменим п.5:
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); //1
$b1->foo(); //1
$a1->foo(); //2
$b1->foo(); //2
//6. Объясните результаты в этом случае.
//новый класс, новый статический $x




//7. *Дан код:
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo(); //1
$b1->foo(); //1
$a1->foo(); //2
$b1->foo(); //2
//Что он выведет на каждом шаге? Почему? */
//это одинковые классы из задания 6. 
//отсутсвие скобок не влияет на работу методов