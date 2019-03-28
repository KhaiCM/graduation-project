<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentContract extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'lessee_id',
        'property_id',
        'rent_time',
        'start_date',
        'end_date',
        'content',
        'total_money',
    ];

    public function properties()
    {
        return $this->belongsTo('App\Models\Property', 'property_id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'lessee_id');
    }
}
