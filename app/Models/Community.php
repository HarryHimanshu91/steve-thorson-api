<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Region;
use App\Models\Event;
use App\Models\Notification;
use App\Models\MapData;

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

     /**
     * Method for getting mapdata
     * @return relations
     */
    
    public function mapdata()
    {
        return $this->hasMany(MapData::class,'center_id');
    }

}
