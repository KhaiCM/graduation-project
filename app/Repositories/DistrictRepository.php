<?php

namespace App\Repositories;

use App\Http\Requests\DistricRequest;
use App\Models\District;
use App\Http\Requests\DistrictRequest;

class DistrictRepository
{
    public function all()
    {
        return District::paginate(config('pagination.all'));
    }

    public function add(DistrictRequest $request)
    {
        $district = new District;
        $district->create([
            'name' => $request->get('name'),
            'provinces_id' => $request->get('provinces_id'),
        ]);
    }
}

