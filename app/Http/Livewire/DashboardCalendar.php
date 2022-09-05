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

    public function events() : Collection
    {

        $dateObject = new DateTime();

        $date = $dateObject->format('Y-m-d');
        //return events van die specifiecke dag en die ingelogde gebruiker
        return $this->getEvents($date);
    }

    public function onDayClick($year, $month, $day)
    {
        //return de events van die specifieke dag die geselecteeerd is
        //wanneer er geen events opstaan komt er een plaats vervanger
        $this->events = $this->getEvents($year . '-' . $month . '-' . $day);
    }

    protected function getEvents($date) : Collection
    {
        return Event::where('date', $date)
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