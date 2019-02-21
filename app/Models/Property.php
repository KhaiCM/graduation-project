<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'property_type_id',
        'district_id',
        'name',
        'address',
        'describe',
        'acreage',
        'price',
        'status',
        'form',
    ];

    public function districts()
    {
        return $this->belongsTo('App\Models\District');
    }

    public function setCalendar()
    {
        return $this->hasMany('App\Model\SetCalendar', 'property_id');
    }

    public function propertyImage()
    {
        return $this->hasMany('App\Model\PropertyImage', 'property_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Model\Comment', 'property_id');
    }

    public function rentContract()
    {
        return $this->hasMany('App\Model\RentContract', 'property_id');
    }

    public function users()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function propertyType()
    {
        return $this->belongsTo('App\Model\PropertyType');
    }
}
