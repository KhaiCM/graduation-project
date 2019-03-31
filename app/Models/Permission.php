<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    protected $fillable = [
        'name', 
    ];

    public function Role()
    {
        return $this->belongsToMany('App\Models\Role');
    }
}
