<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class CouldYouController extends Controller
{
    public function couldYou($id)
    {
        $event = Event::find($id);
        
        return view('platform.events.couldYou')->with('event', $event);
    }
}
