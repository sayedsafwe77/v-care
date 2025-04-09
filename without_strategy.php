<?php
namespace WithoutStrategyPattern;
interface ShippingMethod{
    public function calculateShippingCost($weight, $distance);
}
class StanderedShipping implements ShippingMethod{
    public function calculateShippingCost($weight, $distance){
        return $weight * 0.5 + $distance * 0.2;
    }

}
class ExpressShipping implements ShippingMethod{
    public function calculateShippingCost($weight, $distance){
        return $weight * 1.0 + $distance * 0.5;
    }
}
class OverNightShipping implements ShippingMethod{
    public function calculateShippingCost($weight, $distance){
        return $weight * 2.0 + $distance * 1.0;
    }
}
class Shipping
{
    public function __construct(private ShippingMethod $strategy) {
    }

    public function calculateShippingCost($weight, $distance)
    {
        $this->strategy->calculateShippingCost($weight, $distance);
    }
}

$shipping = new Shipping(new StanderedShipping);

$shipping->calculateShippingCost(10, 100);