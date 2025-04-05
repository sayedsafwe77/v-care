<?php
abstract class Beverage{
    public function prepare(){
        $this->boilWater();
        $this->brew();
        $this->PouringIntoCup();
        $this->addingExtras();
    }
    public function boilWater(){
        echo "Boiling water\n";
    }
    public function PouringIntoCup(){
        echo "Pouring into cup\n";
    }
    abstract function brew();
    abstract function addingExtras();
}
class Tea extends Beverage {
    function brew(){
        echo "Steeping the tea\n";

    }
    function addingExtras(){
        echo "Adding Mint\n";
    }
}
class Coffee extends Beverage  {
    function brew(){
        echo "Dripping coffee through filter\n";
    }
    function addingExtras(){
        echo "Adding sugar and milk\n";
    }
}

$tea = new Tea();
$coffee = new Coffee();

echo "Making tea...\n";
$tea->prepare();

echo "\nMaking coffee...\n";
$coffee->prepare();
