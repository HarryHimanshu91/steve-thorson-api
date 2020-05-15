<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Language;

class Content extends Model
{
     /**
     * The attributes that are mass assignable.
     * @var array
     */

    protected $fillable = [
        'english_title', 'english_description','swahili_title', 'swahili_description', 'cat_name', 'status', 'audio_english_file', 'audio_swahili_file'
    ];

    protected $table ='contents';

    /**
     * Method for getting content to language relationship
     * @return relations
     */
    
    public function language()
    {
        return $this->hasOne(Language::class,'id','language_id');
    }

}
