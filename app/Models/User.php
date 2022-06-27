<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'role',
        'email',
        'password',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
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


    public function company()
    {
        return $this->hasOne('App\Models\Company');
    }

    public function agency()
    {
        return $this->hasOne('App\Models\Agency');
    }

    public function freelancer()
    {
        return $this->hasOne('App\Models\Freelancer');
    }

    public function portfolio()
    {
        return $this->hasMany('App\Models\Portfolio');
    }


    static function getUserName($id)
    {
        $res = self::find($id)->get();
        $name = $res[0]->first_name." ".$res[0]->last_name;
        return $name;
    }

}
