<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'property_id',
        'name',
        'link',
        'status',
    ];

    public function properties()
    {
        return $this->belongsTo('App\Model\Property');
    }
}
