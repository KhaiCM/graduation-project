<?php

namespace App\Repositories;

use App\Models\Property;
use Carbon\Carbon;

class HotProductsRepository
{
    public function all()
    {
        $now = Carbon::now();

        return Property::whereRaw("DATEDIFF('" . $now . "',end_date) < 0");
    }
}
