<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyCategory extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
    ];

    public function propertyType()
    {
        return $this->hasMany('App\Models\PropertyType', 'property_category_id');
    }

    public function properties()
    {
        return $this->hasManyThrough('App\Models\Property', 'App\Models\PropertyType', 'property_category_id', 'property_type_id');
    }
}
