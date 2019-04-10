<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->hasMany('App\Models\Users');
    }
    public function property()
    {
        return $this->hasMany('App\Models\Property');
    }
}
