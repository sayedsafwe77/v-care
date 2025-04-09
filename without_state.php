<?php

interface TrafficLightState{
    public function changeLight(TrafficLight $context);
}
class RedState implements TrafficLightState{
    public function changeLight(TrafficLight $context){
        echo "The light is red. Changing to green...\n";
        $context->setState(new GreenState);
    }

}
class GreenState implements TrafficLightState{
    public function changeLight(TrafficLight $context){
        echo "The light is green. Changing to yellow...\n";
        $context->setState(new YellowState);
    }
}
class YellowState implements TrafficLightState{
    public function changeLight(TrafficLight $context){
        echo "The light is yellow. Changing to red...\n";
        $context->setState(new RedState);
    }
}
class TrafficLight
{
    private TrafficLightState $state;

    public function __construct()
    {
        $this->state = new RedState;
    }
    public function setState(TrafficLightState $state){
        $this->state = $state;
    }

    public function changeLight()
    {
        $this->state->changeLight($this);
    }
}

$trafficLight = new TrafficLight();

$trafficLight->changeLight();
$trafficLight->changeLight();
$trafficLight->changeLight();