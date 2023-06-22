<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'password',
        'level',
    ];

    protected $hidden = [
        'password',
    ];

    public function isAdmin()
    {
        if($this->level == 'admin')
        {
            return true;
        }
        return false;
    }

    public function isKasir()
    {
        if ($this->level == 'kasir') {
            return true;
        }
        return false;
    }

    public function isOwner()
    {
        if ($this->level == 'owner') {
            return true;
        }
        return false;
    }
}