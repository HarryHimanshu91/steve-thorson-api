<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * User has one role relationship
     *
     * @return relations
     */
    public function center(){
        return $this->hasMany(Community::class);
    }
}
