<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
// use App\Models\Content;

class Language extends Model
{
    use HasApiTokens;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id', 'name', 'locale'
    ];

    


}
