<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Services\Facades\EventSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('platform.events.main')->with('events', auth()->user()->getEvents());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('platform.events.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'invited_id' => 'required|integer',
            'type_id' => 'required|integer',
            'title' => 'required|string',
            'date' => 'required|date',
        ]);

        $attributes = $request->all();

        EventSettings::createEvent(
            $validatedData['invited_id'],
            $validatedData['type_id'],
            $validatedData['title'],
            $validatedData['date'],
            $attributes['attributes'],
        );

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {

        Gate::check('can_edit_event', [$event, 'view']);

        return view('platform.events.form')->with('existingEvent', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {
        // dd($request);
        EventSettings::updateEventWithItems($id, $request->validated(), $request->all()['attributes']);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        
        Gate::check('can_edit_event', [$event, 'delete']);

        $event->delete();

        return redirect('/dashboard');
    }
}
