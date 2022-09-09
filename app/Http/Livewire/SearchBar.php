<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchBar extends Component
{

    public $search = '';

    public $searchId = '';

    public $friendSelected;

    public $users = [];

    public function render()
    {
        if (strlen($this->search) <= 3) 
        {
            $this->users = [];
            $this->friendSelected = false;
        }
        else 
        {
            $this->users = User::where('name', "like" ,"%" . $this->search . "%")->get();
        }

        return view('livewire.search-bar');
    }

    public function setUser($user)
    {
        $this->searchId = $user['id'];

        $this->search = $user['email'];

        $this->friendSelected = true;

        $this->users = [];
    }
}
