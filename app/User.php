<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = bcrypt($value);
    }

    public function setCreatedAtAttribute($value)
    {
        return Carbon::make($value)->format('Y-m-d H:i:s');
    }

    public function setUpdatedAtAttribute($value)
    {
        return Carbon::make($value)->format('Y-m-d H:i:s');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::make($value)->format('d/m/Y \a \l\a\s h:m:s a');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::make($value)->format('d/m/Y \a \l\a\s h:m:s a');
    }

    public function clients()
    {
        return $this->hasMany(Client::class, 'user_id', 'id');
    }
}
