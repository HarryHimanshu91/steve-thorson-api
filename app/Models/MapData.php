<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapData extends Model
{
    protected $fillable = [
        'center_id', 'name', 'description', 'category','latitude','longitude'
    ];

}
