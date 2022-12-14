<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo_path',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getEvents()
    {
        // returns enkel de events die deze persoon gemaakt heeft
        // Moet normaal ook de uitgenodigde events tone
        // Voorbeeld nemen aan getFriends functie
        $eventArray = [];

        $createdEvents = $this->hasMany(Event::class, 'creator_id', 'id')->get();
        $invitedEvents = $this->hasMany(Event::class, 'invited_id', 'id')->get();

        foreach ($createdEvents as $event) 
        {
            array_push($eventArray, $event);
        }

        foreach ($invitedEvents as $event) 
        {
            array_push($eventArray, $event);
        }

        return $eventArray;
    }

    public function getFriends()
    {
        $friendArray = [];
        $gotAsked = $this->hasMany(Friend::class, 'asking_id', 'id')->where('accepted', true)->get();
        $asked = $this->hasMany(Friend::class, 'asked_id', 'id')->where('accepted', true)->get();
        
        foreach ($gotAsked as $friend) 
        {
            $newFriend = [
                'id' => $friend->id,
                'friend_id' => $friend->asked_id,
            ];

            array_push($friendArray, $newFriend);
        }

        foreach ($asked as $friend) 
        {
            $newFriend = [
                'id' => $friend->id,
                'friend_id' => $friend->asking_id,
            ];

            array_push($friendArray, $newFriend);
        }

        return $friendArray;

    }

    public function getRequests()
    {
        return $this->hasMany(Friend::class, 'asked_id', 'id')->where('accepted', false)->get();
    }

    
}
