<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'title', 'description', 'cat_name','status'
    ];

    protected $table ='contents';
}
