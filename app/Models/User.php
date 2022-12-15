<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Authorizable, CanResetPassword, Notifiable;

    protected $fillable = [
        'login',
        'name',
        'surname',
        'email',
        'phone',
        'password',
        'avatar',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isLibrarian()
    {
        return $this->role === 'librarian';
    }

    public function reservations($user)
    {
        return $user->hasMany(Reservation::class);
    }
}
