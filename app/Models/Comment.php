<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'property_id',
        'content',
    ];

    public function properties()
    {
        return $this->belongsTo('App\Models\Property');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
