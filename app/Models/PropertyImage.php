<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'property_id',
        'link',
    ];

    public function properties()
    {
        return $this->belongsTo('App\Models\Property');
    }
}
