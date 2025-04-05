<?php
abstract class CaffeineBeverage {
    // Template method
    public function prepareRecipe() {
        $this->boilWater();
        $this->brew();
        $this->pourInCup();
        $this->addCondiments();
    }

    private function boilWater() {
        echo "Boiling water\n";
    }

    private function pourInCup() {
        echo "Pouring into cup\n";
    }

    // Steps to be customized by subclass
    abstract protected function brew();
    abstract protected function addCondiments();
}
class Tea extends CaffeineBeverage {
    protected function brew() {
        echo "Steeping the tea\n";
    }

    protected function addCondiments() {
        echo "Adding lemon\n";
    }
}
class Coffee extends CaffeineBeverage {
    protected function brew() {
        echo "Dripping coffee through filter\n";
    }

    protected function addCondiments() {
        echo "Adding sugar and milk\n";
    }
}

$tea = new Tea();
$coffee = new Coffee();

echo "Making tea...\n";
$tea->prepareRecipe();

echo "\nMaking coffee...\n";
$coffee->prepareRecipe();