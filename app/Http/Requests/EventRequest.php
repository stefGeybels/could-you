<?php

namespace App\Http\Requests;

use App\Models\Event;
use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // $event = Event::find($this->input('id'));

        // return $event && $this->user()->can('can_edit_event', [auth()->user(), $event,'request']);

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
