<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchBar extends Component
{

    public $search = '';

    public $users = [];

    public function render()
    {
        if (strlen($this->search) <= 3) 
        {
            $users = [true];
        }
        else 
        {
            $this->users = User::where('name', "like" ,"%" . $this->search . "%")->get();
        }

        return view('livewire.search-bar');
    }
}
