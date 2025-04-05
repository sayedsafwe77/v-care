<?php
interface ShippingStrategy
{
    public function calculateShippingCost($weight, $distance);
}
class StandardShipping implements ShippingStrategy
{
    public function calculateShippingCost($weight, $distance)
    {
        return $weight * 0.5 + $distance * 0.2;
    }
}
class ExpressShipping implements ShippingStrategy
{
    public function calculateShippingCost($weight, $distance)
    {
        return $weight * 1.0 + $distance * 0.5;
    }
}
class OvernightShipping implements ShippingStrategy
{
    public function calculateShippingCost($weight, $distance)
    {
        return $weight * 2.0 + $distance * 1.0;
    }
}
class Shipping
{
    private $shippingStrategy;

    public function __construct(ShippingStrategy $shippingStrategy)
    {
        $this->shippingStrategy = $shippingStrategy;
    }

    // Set a new strategy at runtime
    public function setShippingStrategy(ShippingStrategy $shippingStrategy)
    {
        $this->shippingStrategy = $shippingStrategy;
    }

    public function calculateShippingCost($weight, $distance)
    {
        return $this->shippingStrategy->calculateShippingCost($weight, $distance);
    }
}
$standardShipping = new Shipping(new StandardShipping());
echo "Standard Shipping: " . $standardShipping->calculateShippingCost(10, 100) . "\n";

$standardShipping->setShippingStrategy(new ExpressShipping());
echo "Express Shipping: " . $standardShipping->calculateShippingCost(10, 100) . "\n";

$standardShipping->setShippingStrategy(new OvernightShipping());
echo "Overnight Shipping: " . $standardShipping->calculateShippingCost(10, 100) . "\n";