<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CouldYouController extends Controller
{
    public function couldYou($id)
    {
        $event = Event::find($id);

        Gate::check('can_edit_event', [$event, 'view']);
        
        return view('platform.events.couldYou')->with('event', $event);
    }
}
