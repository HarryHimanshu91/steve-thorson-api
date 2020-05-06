<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Community;

class Notification extends Model
{
    protected $guarded = [];

    /**
     * Method for getting notification to community relationship
     * @return relations
     */

    public function community()
    {
        return $this->hasOne(Community::class,'id','center_id');
    }

}
