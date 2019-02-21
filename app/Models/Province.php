<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
    ];

    public function districts()
    {
        return $this->hasMany('App\Model\District', 'provinces_id');
    }
    
    public function properties()
    {
        return $this->hasManyThrough('App\Model\Property', 'App\model\District', 'provinces_id', 'district_id');
    }
}
