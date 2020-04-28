<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Content;
use App\Models\Community;

class Event extends Model
{
    protected $guarded = [];

    public function contents()
    {
        return $this->hasOne(Content::class,'id','content_id');
    }

    public function community()
    {
        return $this->hasOne(Community::class,'id','center_id');
    }
    
}
