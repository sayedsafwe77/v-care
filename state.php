<?php
interface TrafficLightState
{
    public function changeLight(TrafficLightContext $context);
}
class RedState implements TrafficLightState
{
    public function changeLight(TrafficLightContext $context)
    {
        echo "The light is red. Changing to green...\n";
        $context->setState(new GreenState());  // Change to Green
    }
}

class YellowState implements TrafficLightState
{
    public function changeLight(TrafficLightContext $context)
    {
        echo "The light is yellow. Changing to red...\n";
        $context->setState(new RedState());  // Change to Red
    }
}

class GreenState implements TrafficLightState
{
    public function changeLight(TrafficLightContext $context)
    {
        echo "The light is green. Changing to yellow...\n";
        $context->setState(new YellowState());  // Change to Yellow
    }
}
class TrafficLightContext
{
    private $state;

    public function __construct()
    {
        // Initial state is Red
        $this->state = new RedState();
    }

    public function setState(TrafficLightState $state)
    {
        $this->state = $state;
    }

    public function changeLight()
    {
        $this->state->changeLight($this);
    }
}

$trafficLight = new TrafficLightContext();

$trafficLight->changeLight();  // The light is red. Changing to green...
$trafficLight->changeLight();  // The light is green. Changing to yellow...
$trafficLight->changeLight();  // The light is yellow. Changing to red...