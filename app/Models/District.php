<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
    ];

    public function provinces()
    {
        return $this->belongsTo('App\Model\Province');
    }
    
    public function properties()
    {
        return $this->hasMany('App\Model\Property', 'district_id');
    }
}
