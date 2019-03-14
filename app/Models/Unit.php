<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
    ];

    public function property()
    {
        return $this->hasOne('App\Models\Property');
    }
}
