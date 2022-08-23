<?php

namespace App\Services;

use App\Models\Event;
use App\Models\Type;
use App\Models\Check;
use DateTime;

class PlatformServices
{
    protected $userId;

    protected $datetime;

    protected $event;

    protected $types = [
        'checks' => Check::class,
    ];

    public function __construct($userId)
    {
        $this->userId = $userId;
        
        $this->datetime = new DateTime();

        $this->datetime = $this->datetime->format('Y-m-d G:i:s');
    }

    public function getTypeModelByEvent(Event $event)
    {
        $eventType = Type::find($event->type_id)->title;

        return $this->types[$eventType];
    }

    public function getTypeModelById($eventId)
    {
        $eventType = Type::find($eventId)->title;

        return $this->types[$eventType];
    }

    public function getTypeClassById($eventId)
    {
        $eventType = Type::find($eventId)->title;

        return new $this->types[$eventType];
    }

    
}