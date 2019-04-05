<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service_detail extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'service_id',
        'start_date',
        'end_date',
        'property_id',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function service()
    {
        return $this->belongsTo('App\Models\Services', 'service_id');
    }
    public function property()
    {
        return $this->belongsTo('App\Models\Property', 'service_id');
    }
}
