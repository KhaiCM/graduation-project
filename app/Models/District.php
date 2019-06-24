<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Statistic;

class District extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'provinces_id',
    ];

    public function provinces()
    {
        return $this->belongsTo('App\Models\Province');
    }

    public function properties()
    {
        return $this->hasMany('App\Models\Property', 'district_id');
    }

    public function searchStatistics()
    {
        return $this->morphMany('App\Models\Statistic', 'object')->where('type', Statistic::TYPE_SEARCH);
    }
}
