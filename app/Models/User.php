<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table="user";
    protected $primaryKey = 'ID_USER';
    public $timestamps = false;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ID_USER',
        'NAMA_SKPD',
        'USERNAME',
        'email',
        'password',
        'KEPALA_SKPD',
        'NIP_KEPALA',
        'ID_ROLE',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'passPASSWORDword',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

}
