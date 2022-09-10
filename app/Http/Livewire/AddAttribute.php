<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class AddAttribute extends Component
{
    public $attributes = [];

    public $item;

    public $event;

    public $updateEvent = false;

    public $typeId;

    public function mount()
    {
        // toevoegen van een variabele die aangeeft of we op een create of update pagina zitten
        if (isset($this->event)) 
        {
            $eventToUpdate = Event::find($this->event);
            $items = $eventToUpdate->getItems($this->typeId)->get();
            
            for ($i=0; $i < count($items); $i++) 
            { 
                $this->attributes[] = [
                    "id" => $i,
                    "title" => $items[$i]['item'],
                    'item_id' => $items[$i]['id'],
                ];
            }
            unset($this->event);

            $this->updateEvent = true;
        }
        return view('livewire.add-attribute');
    }

    public function addAttribute()
    {
        $this->attributes[] = [
            "id" => count($this->attributes),
            "title" => "",
        ];
    }

    public function changeItem()
    {
        dd('test');
        // $this->attributes[$itemId]['title'] = $this->item;
    }


}
