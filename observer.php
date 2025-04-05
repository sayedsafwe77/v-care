<?php
class Event {
    public function getEventName(): string {
        return (new \ReflectionClass($this))->getShortName();
    }
}
class SendNotificationEvent extends Event{
    public array $data;

    public function __construct(array $data = []) {
        $this->data = $data;
    }
}

interface EventListener {
    public function handle(Event $event): void;
}

class SendEmailListener implements EventListener {
    public function handle(Event $event): void {
        echo "📧 Sending email for event: {$event->getEventName()}\n";
    }
}

class SendPushNotificationListener implements EventListener {
    public function handle(Event $event): void {
        echo "📱 Sending push notification for event: {$event->getEventName()}\n";
    }
}

class NotificationService {
    private array $listeners = [];

    public function subscribe(string $event, string $listener): void {
        $this->listeners[$event][] = $listener;
    }

    public function unsubscribe(string $event, string $listener): void {
        if (!isset($this->listeners[$event])) return;

        $this->listeners[$event] = array_filter(
            $this->listeners[$event],
            fn($l) => $l !== $listener
        );
    }
    public function notify(Event $event): void {
        $eventName = $event->getEventName();
        if (!isset($this->listeners[$eventName])) return;

        foreach ($this->listeners[$eventName] as $listener) {
            (new $listener)->handle($event);
        }
    }


}

class Store {
    private NotificationService $notificationService;

    public function __construct(NotificationService $notificationService) {
        $this->notificationService = $notificationService;
    }

    public function addItem(string $itemName): void {
        echo "🛒 Item added to store: $itemName\n";
        $event = new SendNotificationEvent(['item' => $itemName]);
        $this->notificationService->notify($event);
    }
}

$notificationService = new NotificationService();

$notificationService->subscribe(SendNotificationEvent::class, SendEmailListener::class);

$notificationService->subscribe(SendNotificationEvent::class, SendPushNotificationListener::class);

$store = new Store($notificationService);
$store->addItem("Awesome T-Shirt");