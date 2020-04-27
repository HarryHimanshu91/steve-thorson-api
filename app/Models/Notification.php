<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Community;

class Notification extends Model
{
    protected $guarded = [];

    public function community()
    {
        return $this->hasOne(Community::class,'id','center_id');
    }

}
