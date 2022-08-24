<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function specificFriend($userId, $friendId)
    {
        $gotAsked = $this->where('accepted', true)->where('asking_id', $friendId)->get();
        $asked = $this->where('accepted', true)->where('asked_id', $friendId)->get();

        if (!$gotAsked->isEmpty()) 
        {
            return $gotAsked;
        }

        return $asked;
    }
}
