<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
    ];

    public function serviceDetail()
    {
        return $this->hasOne('App\Models\Services', 'service_id');
    }
}
