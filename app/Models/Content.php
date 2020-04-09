<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'title', 'description', 'cat_name'
    ];

    protected $table ='contents';
}
