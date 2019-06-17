<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SetCalendar extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['date'];

    protected $fillable = [
        'property_id',
        'date',
        'time',
        'phone',
        'email',
        'note',
        'user_id'
    ];

    public function properties()
    {
        return $this->belongsTo('App\Models\Property');
    }
}
