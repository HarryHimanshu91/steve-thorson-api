<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Content;
use App\Models\Community;

class Event extends Model
{
    protected $guarded = [];

    /**
     * Method for getting event to content relationship
     * @return relations
     */

    public function contents()
    {
        return $this->hasOne(Content::class,'id','content_id');
    }

    /**
     * Method for getting event to community relationship
     * @return relations
     */

    public function community()
    {
        return $this->hasOne(Community::class,'id','center_id');
    }
    
}
