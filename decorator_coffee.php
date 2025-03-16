<?php

interface Beverage
{
    public function getDescription(): string;
    public function getCost(): float;
}

class Espresso implements Beverage
{

    public function getDescription(): string
    {
        return "Espresso";
    }

    public function getCost(): float
    {
        return 20.0;
    }
}

class HouseBlend implements Beverage
{
    public function getDescription(): string
    {
        return "House Blend Coffee";
    }

    public function getCost(): float
    {
        return 15.0;
    }
}
class Tea implements Beverage{

}
abstract class CondimentDecorator implements Beverage
{
    protected Beverage $beverage;

    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
    }

    abstract public function getDescription(): string;
}

class Milk extends CondimentDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ", Milk";
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + 5.0;
    }
}

class Sugar extends CondimentDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ", Sugar";
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + 2.0;
    }
}

class WhippedCream extends CondimentDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ", Whipped Cream";
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + 7.0;
    }
}

// Basic Espresso
$beverage = new Espresso();
echo $beverage->getDescription() . " => " . $beverage->getCost() . " EGP\n";

// Add Milk
$beverageWithMilk = new Milk($beverage);
echo $beverageWithMilk->getDescription() . " => " . $beverageWithMilk->getCost() . " EGP\n";

// Add Sugar on top
$beverageWithMilkAndSugar = new Sugar($beverageWithMilk);
echo $beverageWithMilkAndSugar->getDescription() . " => " . $beverageWithMilkAndSugar->getCost() . " EGP\n";

// Add Whipped Cream on top
$fancyCoffee = new WhippedCream($beverageWithMilkAndSugar);
echo $fancyCoffee->getDescription() . " => " . $fancyCoffee->getCost() . " EGP\n";


// enum BeverageType{
//     case Espresso;
//     case EspressoWithMilk;
//     case EspressoWithSuger;
//     case Coffee;
//     case Tea;
//     case TeaWithMilk;
//     case TeaWithMSugger;
// }
// class Beverage{
//     public function __construct(public BeverageType $type) {
//     }
//     function getDescription() {
//         match($this->type){
//             BeverageType::Espresso => 'espresso',
//             BeverageType::EspressoWithMilk => 'espresso with milk',
//             BeverageType::EspressoWithSuger => 'espresso with suger',
//             BeverageType::Coffee => 'coffee',
//             BeverageType::Tea => 'tea',
//         };
//     }
// }



// beverage class
// addon class

// $beverage = new Tea;
// $beverageWithSuger = new Suger($beverage);
// $beverageWithSugerAndMilk = new Milk($beverageWithSuger);

// echo $beverageWithSugerAndMilk->getCost();

// abstract class AddOns{
//     function withMilk() : Returntype {

//     }
//     function withSuger() : Returntype {

//     }
//     function withSuger() : Returntype {

//     }
// }
// class Tea extends AddOns{

// }

// class Coffee extends AddOns{
// }
// abstract class AddOns{
//     public function __construct(public Beverage $beverage) {
//     }
// }
// class Milk extends AddOns{
//     function getDescription() : Returntype {
//         return $this->beverage->getDescription() . ' with milk';
//     }
// }
// class Suger extends AddOns{
//     function getDescription() : Returntype {
//         return $this->beverage->getDescription() . ' with suger';
//     }
// }