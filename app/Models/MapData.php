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
        'center_id', 'name', 'category', 'eng_description', 'eng_directions', 'swa_description', 'swa_directions', 'phone_number', 'url', 'latitude','longitude'
    ];

}
