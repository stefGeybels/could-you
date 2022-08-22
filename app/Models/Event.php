<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function getCreator()
    {
        return $this->belongsTo(User::class);
    }

    public function getInvited()
    {
        return $this->belongsTo(User::class);
    }

    public function getType()
    {
        return $this->belongsTo(Type::class);
    }

    public function getChecks()
    {
        return $this->hasMany(Check::class, 'event_id', 'id');
    }

}
