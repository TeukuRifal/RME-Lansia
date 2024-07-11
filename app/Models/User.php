<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'username', 'email', 'password', 'role', 'last_login_at',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'last_login_at',
    ];

    protected $dispatchesEvents = [
        'login' => 'App\Events\UserLoggedIn',
    ];
    
    // Relationship jika dibutuhkan
    public function patient()
    {
        return $this->hasOne(Patient::class);
    }

    // Method untuk mengatur last_login_at
    public function setLastLoginAtAttribute($value)
    {
        $this->attributes['last_login_at'] = Carbon::parse($value);
    }
}
