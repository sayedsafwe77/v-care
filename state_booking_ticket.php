<?php
interface TicketState
{
    public function book(Ticket $ticket);
    public function cancel(Ticket $ticket);
    public function sell(Ticket $ticket);
}
class AvailableState implements TicketState
{
    public function book(Ticket $context)
    {
        echo "Ticket is available. Booking the ticket...\n";
        $context->setState(new ReservedState());  // Change to Reserved state
    }

    public function cancel(Ticket $context)
    {
        echo "Ticket is already available. No booking to cancel.\n";
    }

    public function sell(Ticket $context)
    {
        echo "Ticket is available. Selling the ticket...\n";
        $context->setState(new SoldState());  // Change to Sold state
    }
}
class ReservedState implements TicketState
{
    public function book(Ticket $context)
    {
        echo "Ticket is already reserved. Cannot book again.\n";
    }

    public function cancel(Ticket $context)
    {
        echo "Cancelling reservation...\n";
        $context->setState(new AvailableState());  // Change back to Available state
    }

    public function sell(Ticket $context)
    {
        echo "Ticket is reserved. Selling the ticket...\n";
        $context->setState(new SoldState());  // Change to Sold state
    }
}
class SoldState implements TicketState
{
    public function book(Ticket $context)
    {
        echo "Ticket is already sold. Cannot book.\n";
    }

    public function cancel(Ticket $context)
    {
        echo "Ticket is sold. Cannot cancel.\n";
    }

    public function sell(Ticket $context)
    {
        echo "Ticket is already sold. Cannot sell again.\n";
    }
}
class Ticket
{
    private $state;

    public function __construct()
    {
        $this->state = new AvailableState();
    }

    public function setState(TicketState $state)
    {
        $this->state = $state;
    }

    public function book()
    {
        $this->state->book($this);
    }

    public function cancel()
    {
        $this->state->cancel($this);
    }

    public function sell()
    {
        $this->state->sell($this);
    }
}
// Create a ticket
$ticket = new Ticket();

// Book the ticket (Ticket is available)
$ticket->book();  // Ticket is available. Booking the ticket...

// Try to book again (Ticket is now reserved)
$ticket->book();  // Ticket is already reserved. Cannot book again.

// Cancel the reservation (Ticket goes back to available)
$ticket->cancel();  // Cancelling reservation...

// Try to sell the ticket (Ticket is now available)
$ticket->sell();  // Ticket is available. Selling the ticket...

// Try to book again (Ticket is now sold)
$ticket->book();  // Ticket is already sold. Cannot book.