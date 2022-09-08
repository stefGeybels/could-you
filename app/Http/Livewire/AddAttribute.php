<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddAttribute extends Component
{
    public $attributes = [];

    public function render()
    {
        return view('livewire.add-attribute');
    }

    public function addAttribute()
    {
        array_push($this->attributes, "");

        return $this->attributes;
    }
}
