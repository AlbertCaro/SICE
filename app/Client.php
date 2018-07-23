<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = true;
    protected $table = 'oauth_clients';

    protected $fillable = [
        'user_id',
        'name',
        'secret',
        'redirect',
        'personal_access_client',
        'password_client',
        'revoked'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
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

    public function getStatusAttribute()
    {
        if ($this->revoked === 0)
            return "Concedido";
        else
            return "Revocado";
    }
}
