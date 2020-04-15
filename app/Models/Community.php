<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Region;

class Community extends Model
{
    public function region(){
        return $this->hasOne(Region::class, 'id','region_id');
    }
}
