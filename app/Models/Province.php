<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Statistic;

class Province extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
    ];

    public function districts()
    {
        return $this->hasMany('App\Models\District', 'provinces_id');
    }
    
    public function properties()
    {
        return $this->hasManyThrough('App\Models\Property', 'App\models\District', 'provinces_id', 'district_id');
    }

    public function searchStatistics()
    {
        return $this->morphMany('App\Models\Statistic', 'object')->where('type', Statistic::TYPE_SEARCH);
    }
}
