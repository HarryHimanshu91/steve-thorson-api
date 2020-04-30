<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapData extends Model
{
   
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'center_id', 'name', 'description', 'category','latitude','longitude'
    ];

}
