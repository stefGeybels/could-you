<?php

namespace App\Http\Requests;

use App\Models\Event;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $event = Event::find($this->route('event'));

        Gate::allowIf(function ($user) use ($event)
        {
            if ($event->creator_id == $user->id || $event->invited_id == $user->id) 
            {
                return true;
            }

            return false;
        } );

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'invited_id' => 'required|integer',
            'type_id' => 'required|integer',
            'title' => 'required|string',
            'date' => 'required|date',
        ];
    }
}
