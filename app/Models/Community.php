<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Region;
use App\Models\Event;
use App\Models\Notification;

class Community extends Model
{
    
    /**
     * Method for getting community to region relationship
     * @return relations
     */

    public function region()
    {
        return $this->hasOne(Region::class, 'id','region_id');
    }



    /**
     * Method for getting community to events relationship
     * @return relations
     */

    public function events()
    {
        return $this->hasMany(Event::class,'center_id');
    }



    /**
     * Method for getting community to notification relationship
     * @return relations
     */
    
    public function notifications()
    {
        return $this->hasMany(Notification::class,'center_id');
    }

}
