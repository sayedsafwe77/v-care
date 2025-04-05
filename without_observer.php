<?php
namespace WithoutObserver;

use ReflectionClass;

interface Listener{
    static public function handle(Event $event);
}

abstract class Event{
    public function getName(){
        return (new ReflectionClass($this))->getName();
    }
}

class SendEmailListener implements Listener {
    static public function handle(Event $event): void {
        echo "📧 Email sent: New item added - {$event->getName()}\n";
    }
}

class SendPushNotificationListener implements Listener {
    static public function handle(Event $event): void {
        echo "📱 Push notification: New item added - {$event->getName()}\n";
    }
}
class SendSMSNotificationListener implements Listener {
    static public function handle(Event $event): void {
        echo "📱 SMS notification: New item added - {$event->getName()}\n";
    }
}

class SendNewItemEvent extends Event{
    public function __construct(public array $newItem) {
    }
}


class NotificationService{
    public array $listeners = [];
    public function subscribe(string $event,string $listener){
        $this->listeners[$event][] = $listener;
    }
    public function unsubscribe(string $event,string $listener){
        $this->listeners[$event] = array_filter($this->listeners[$event],fn($l) => $l != $listener );
    }
    public function notify($event){
        $eventName = $event->getName();
        if(!isset($this->listeners[$eventName])) return;
        foreach($this->listeners[$eventName] as $listener){
            $listener::handle($event);
        }
    }
}




class Store {
    public function __construct(private NotificationService $service) {
    }

    public function addItem(string $itemName): void {
        echo "🛒 Item added to store: $itemName\n";

        $this->service->notify(new SendNewItemEvent(['title' => 'book1']));
    }
}

$service = new NotificationService;
$service->subscribe(SendNewItemEvent::class,SendPushNotificationListener::class);
$service->subscribe(SendNewItemEvent::class,SendSMSNotificationListener::class);
$service->subscribe(SendNewItemEvent::class,SendEmailListener::class);
$store = new Store($service);
$store->addItem("Awesome T-Shirt");