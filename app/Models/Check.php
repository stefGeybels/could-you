<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function getEvent()
    {
        return $this->hasOne(Event::class, 'id', 'event_id');
    }
}
