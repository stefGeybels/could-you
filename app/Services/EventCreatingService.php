<?php

namespace App\Services;

use App\Models\Check;
use App\Models\Event;
use App\Models\StandardEvent;
use App\Models\Type;
use DateTime;
use App\Services\PlatformServices;

class EventCreatingService extends PlatformServices
{
    // protected $userId;

    // protected $datetime;

    // protected $event;

    // protected $types = [
    //     'checks' => Check::class,
    // ];

    // public function __construct($userId)
    // {
    //     $this->userId = $userId;
        
    //     $this->datetime = new DateTime();

    //     $this->datetime = $this->datetime->format('Y-m-d');
    // }
    
    public function createEvent($invitedUser, $typeId, $title, $date, array $itemArray)
    {
        $this->event = Event::create([
            'creator_id' => $this->userId,
            'invited_id' => $invitedUser,
            'type_id' => $typeId,
            'title' => $title,
            'date' => $date,
            'created_at' => $this->datetime,
            'updated_at' => $this->datetime,
        ]);

        $this->addItems($this->event, $itemArray);

        return $this->event;
    }

    public function addItems(Event $event, array $items)
    {
        $model = $this->getTypeModelByEvent($event);
        foreach ($items as $item) 
        {
            $type = new $model;
            $type->event_id = $event->id;
            $type->item = $item;
            $type->created_at = $this->datetime;
            $type->updated_at = $this->datetime;
            $type->save();
        }

        return true;
    }

    public function updateEvent($eventId, array $itemsToUpdate)
    {
        $event = Event::find($eventId);
        $event->update($itemsToUpdate);

        return $event;
    }

    public function updateEventWithItems($eventId, array $eventItemsToUpdate, array $attributesToUpdate)
    {
        $event = $this->updateEvent($eventId, $eventItemsToUpdate);
        foreach ($attributesToUpdate as $attribute) 
        {
            $this->updateItem($event->id, $attribute->id, $attribute->title);
        }

        return $event;
    }

    public function typeChange($eventId, $newType)
    {
        $event = Event::find($eventId);

        $this->deleteItems($event);

        $event->type_id = $newType;

        $event->save();

        return $event;

    }

    public function updateItem( $typeId, $itemId, $title)
    {
        $model = $this->getTypeModelById($typeId);
        $item = $model::find($itemId);
        $item->item = $title;
        $item->save();

        return true;
    }

    public function deleteItem($typeId, $itemId)
    {
        $model = $this->getTypeModelById($typeId);
        $item = $model::find($itemId)->delete();

        return true;
    }

    public function deleteEvent($eventId)
    {
        Event::find($eventId)->delete();

        return true;
    }

    public function deleteItems(Event $event)
    {
        $items = $event->getItems($event->type_id)->get();

        foreach ($items as $item) 
        {
            $item->delete();
        }

        return true;
    }

    public function makeFavorite($eventId)
    {
        $standardEvent = StandardEvent::create([
            'event_id' => $eventId,
            'user_id' => $this->userId,
        ]);

        return $standardEvent;
    }

    public function deleteFavorite($favoriteId)
    {
        StandardEvent::find($favoriteId)->delete();

        return true;
    }
}
