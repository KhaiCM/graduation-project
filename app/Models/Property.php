<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'unit_id',
        'property_type_id',
        'district_id',
        'name',
        'address',
        'describe',
        'acreage',
        'price',
        'status',
        'form',
        'image',
        'end_date',
    ];

    public function districts()
    {
        return $this->belongsTo('App\Models\District', 'district_id');
    }

    public function setCalendar()
    {
        return $this->hasMany('App\Models\SetCalendar');
    }

    public function propertyImage()
    {
        return $this->hasMany('App\Models\PropertyImage', 'property_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'property_id');
    }

    public function rentContract()
    {
        return $this->hasMany('App\Models\RentContract');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function propertyType()
    {
        return $this->belongsTo('App\Models\PropertyType');
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Unit', 'unit_id');
    }
    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id');
    }
}
