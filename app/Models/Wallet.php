<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class wallet extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'balance',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
