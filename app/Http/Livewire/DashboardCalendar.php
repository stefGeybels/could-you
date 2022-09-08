<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\User;
use App\Services\Facades\FriendSettings;
use Asantibanez\LivewireCalendar\LivewireCalendar;
use DateTime;
use Illuminate\Support\Collection;
use Livewire\Component;

class DashboardCalendar extends LivewireCalendar
{

    public $day;

    public function events() : Collection
    {

        $dateObject = new DateTime();

        $date = $dateObject->format('Y-m-d');
        // $this->day = $dateObject->format('d M');
        //return events van die specifiecke dag en die ingelogde gebruiker
        return $this->getEvents($date);
    }

    public function onDayClick($year, $month, $day)
    {

        $dateObject = new DateTime($year . '/' . $month . '/' . $day);

        //return de events van die specifieke dag die geselecteeerd is
        //wanneer er geen events opstaan komt er een plaats vervange
        $this->events = $this->getEvents($year . '-' . $month . '-' . $day);
        $this->day = $dateObject->format('d M');
    }

    protected function getEvents($date) : Collection
    {
        $userId = auth()->user()->id;
        return Event::where('date', $date)
            // ->where('creator_id', $userId)
            // ->where('invited_id', $userId)
            ->get()
            ->map(function($event)
            {
                $friendId = FriendSettings::filterFriendsFromEvent($event);
                $friendInfo = User::find($friendId);

                $date = strtotime($event->date);
                $date = date('F jS, o', $date);

                return [
                    'id' => $event->id,
                    'title' => $event->title,
                    'date' => $date,
                    'name_friend' => $friendInfo->name,
                    'profile_photo' => $friendInfo->profile_photo_path,
                ];
            });
    }
}