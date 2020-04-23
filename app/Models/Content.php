<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Language;

class Content extends Model
{
    protected $fillable = [
        'title', 'description', 'cat_name','status','language_id'
    ];

    protected $table ='contents';

    public function language()
    {
        return $this->hasOne(Language::class,'id','language_id');
    }

}
