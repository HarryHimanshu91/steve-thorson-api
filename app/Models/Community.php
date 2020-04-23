<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Region;
use App\Models\Event;
use App\Models\Notification;

class Community extends Model
{
    public function region(){
        return $this->hasOne(Region::class, 'id','region_id');
    }

    public function events()
    {
        return $this->hasMany(Event::class,'center_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class,'center_id');
    }

}
