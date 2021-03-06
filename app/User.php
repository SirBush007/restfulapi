<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    const VERIFIED_USER='1';

    const UNVERIFIED_USER='0';

    const ADMIN_USER='true';

    const REGULAR_USER='false';

    protected $fillable = [
        'name', 'email', 'password', 'verified', 'verification_token', 'admin',
    ];

    protected $table='users';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'verification_token',
    ];

    public function isAdmin()
    {
        return $this->admin == User::ADMIN_USER;
    }

    public function isVerified()
    {
        return $this->status ==  User::VERIFIED_USER;
    }

    public function generateVerificationCode()
    {
        return str_random(40);
    }
}
