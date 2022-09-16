<?php

namespace App\Http\Livewire;

use App\Services\Facades\EventSettings;
use Livewire\Component;

class CouldYou extends Component
{
    public $event;
    public $typeId;

    public $attributes = [];

    public function mount($event)
    {
        $this->event = $event;
        $this->typeId = $event->type_id;
        $this->attributes = $event->getItems($event->type_id)->get();
    }
    
    public function render()
    {
        return view('livewire.could-you');
    }

    public function updateCheckbox($itemId)
    {
        EventSettings::updateBoolItem($this->typeId, $itemId);
    }
}
