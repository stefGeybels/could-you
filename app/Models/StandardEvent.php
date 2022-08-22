<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandardEvent extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function getEvent()
    {
        return $this->belongsTo(Event::class);
    }

    public function getUser()
    {
        return $this->belongsTo(User::class);
    }
}
