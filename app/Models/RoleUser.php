<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'role_id', 
        'user_id', 
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function roles()
    {
        return $this->belongsTo('App\Models\Role');
    }
}
