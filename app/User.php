<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Models\Region;
use App\Models\Community;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'phone', 'password', 'uid', 'is_verified', 'region_id', 'center_id', 'profile_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'uid', 'phone_verified_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   
    /**
     * User has one role relationship
     *
     * @return relations
     */
    public function region(){
        return $this->hasOne(Region::class, 'id','region_id');
    }

    /**
     * User has one role relationship
     *
     * @return relations
     */
    public function center(){
        return $this->hasOne(Community::class, 'id','center_id');
    }

}
