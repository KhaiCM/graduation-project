<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'title', 
        'component_id', 
        'content', 
        'image', 
        'status', 
        'slug',
    ];
}
