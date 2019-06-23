<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
	const TYPE_SEARCH = 'search';

    public $timestamps = false;

    protected $fillable = [
    	'type',
        'count',
        'month',
        'year',
    ];


	public function object()
	{
		return $this->morphTo();
	}
}
