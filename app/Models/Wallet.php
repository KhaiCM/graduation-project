<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wallet extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'balance',
        'total_amount',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
