<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
    ];

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'category_post_id');
    }
}
