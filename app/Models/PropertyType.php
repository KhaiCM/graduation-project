<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Statistic;

class PropertyType extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'status',
        'property_category_id',
    ];

    public function properties()
    {
        return $this->hasMany('App\Models\Property', 'property_type_id');
    }

    public function propertyCategory()
    {
        return $this->belongsTo('App\Models\PropertyCategory');
    }

    public function searchStatistics()
    {
        return $this->morphMany('App\Models\Statistic', 'object')->where('type', Statistic::TYPE_SEARCH);
    }
}
