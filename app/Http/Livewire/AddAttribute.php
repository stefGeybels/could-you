<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddAttribute extends Component
{
    public $attributes = [];

    public $item;

    public function render()
    {
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
