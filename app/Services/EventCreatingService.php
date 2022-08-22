<?php

namespace App\Services;

use App\Models\Event;
use DateTime;

class EventCreatingService
{
    protected $userId;

    protected $datetime;

    protected $event;

    public function __construct($userId)
    {
        $this->userId = $userId;
        
        $this->datetime = new DateTime();
    }
    
    public function createEvent($invitedUser, $typeId, $title, $date)
    {
        $this->event = Event::create([
            'creator_id' => $this->userId,
        ]);

        $this->event->invited_id = $invitedUser;
        $this->event->type_id = $typeId;
        $this->event->title = $title;
        $this->event->date = $date;
        $this->event->created_at = $this->datetime->getTimestamp();

        return $this->event;
    }

    public function addItems(Event $event, array $items)
    {
        
        return true;
    }
}
