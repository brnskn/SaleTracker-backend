<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'distributor_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $appends = [
        'earnings',
    ];
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
    public function transactions()
    {
        return $this->hasMany('App\UserTransaction');
    }
    public function missions()
    {
        return $this->hasMany('App\UserMission');
    }
    public function getEarningsAttribute()
    {
        return $this->transactions()->sum('price');
    }
}
