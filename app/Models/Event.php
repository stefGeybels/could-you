<?php

namespace App\Models;

use App\Services\PlatformServices;
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

    public function getItems($id)
    {
        //static user id for less db request
        // first user will always be a dummie user
        $serviceClass = new PlatformServices(1);
        $modelType = $serviceClass->getTypeClassById($id);
        return $this->hasMany($modelType::class, 'event_id', 'id');
    }

}
