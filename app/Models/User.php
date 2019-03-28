<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'user_id');
    }

    public function properties()
    {
        return $this->hasMany('App\Models\Property', 'user_id');
    }

    public function rentContract()
    {
        return $this->hasMany('App\Models\RentContract');
    }

    public function roleUser()
    {
        return $this->hasMany('App\Models\RoleUser', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'follows_id', 'user_id')
                    ->withTimestamps();
    }

    public function follows()
    {
        return $this->belongsToMany(self::class, 'followers', 'user_id', 'follows_id')
                    ->withTimestamps();
    }

    public function isFollowing($userId)
    {
        return (boolean)$this->follows()->where('follows_id', $userId)->first(['users.id']);
    }

    public function wallet()
    {
        return $this->hasOne('App\Models\Wallet', 'wallet_id');
    }
    public function serviceDetial()
    {
        return $this->hasOne('App\Models\Service_detail', 'user_id');
    }
}
