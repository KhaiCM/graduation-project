<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'name', 
    ];

    public function roleUser()
    {
        return $this->hasMany('App\Models\RoleUser', 'role_id');
    }
}
