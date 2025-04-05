<?php
interface TicketState{
    public function book(Ticket $context);
    public function cancel(Ticket $context);
    public function sell(Ticket $context);
}
abstract class TicketStateBase{
    static private $state;
    private function __construct(){}
    static public function getState(){
        if(!isset(self::$state)) self::$state = new static;
        return self::$state;
    }
}
class AvailableState extends TicketStateBase implements TicketState{
    public function book(Ticket $context){
        echo "Ticket is available. Booking the ticket...\n";
        $context->setState(ReservedState::getState());
    }
    public function cancel(Ticket $context){
        echo "Ticket is already available. No booking to cancel.\n";

    }
    public function sell(Ticket $context){
        echo "Ticket is available. Selling the ticket...\n";
        $context->setState(SoldState::getState());
    }
}
class ReservedState extends TicketStateBase implements TicketState{
    public function book(Ticket $context){
        echo "Ticket is reserved. Cannot book again.\n";

    }
    public function cancel(Ticket $context){
        echo "Cancelling reservation...\n";
        $context->setState(AvailableState::getState());
    }
    public function sell(Ticket $context){
        echo "Ticket is reserved. Cannot sell yet.\n";

    }

}
class SoldState extends TicketStateBase implements TicketState{
    public function book(Ticket $context){
        echo "Ticket is already sold. Cannot book.\n";

    }
    public function cancel(Ticket $context){
        echo "Ticket is sold. Cannot cancel.\n";

    }
    public function sell(Ticket $context){
        echo "Ticket is already sold. Cannot sell again.\n";

    }

}

class Ticket
{
    private $state;

    public function __construct()
    {
        $this->state = AvailableState::getState();
    }
    function setState($state)  {
        $this->state = $state;
    }

    public function bookTicket()
    {
      $this->state->book($this);
    }

    public function cancelBooking()
    {
      $this->state->cancel($this);

    }

    public function sellTicket()
    {
        $this->state->sell($this);
    }
}

$ticket = new Ticket();

// Ticket available and can be booked
$ticket->bookTicket();  // Ticket is available. Booking the ticket...

// Ticket reserved, cannot book again
$ticket->bookTicket();  // Ticket is reserved. Cannot book again.

// Cancel the reservation
$ticket->cancelBooking();  // Cancelling reservation...

// Now the ticket is available again
$ticket->bookTicket();  // Ticket is available. Booking the ticket...

// Sell the ticket
$ticket->sellTicket();  // Ticket is available. Selling the ticket...