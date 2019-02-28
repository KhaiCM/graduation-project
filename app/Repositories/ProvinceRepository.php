<?php

namespace App\Repositories;

use App\Models\Province;
use App\Http\Requests\ProvinceRequest;

class ProvinceRepository
{
    public function all()
    {
        return Province::paginate(config('pagination.all'));
    }
    public function add(ProvinceRequest $request)
    {
        $province = new Province;
        $province->create([
            'name' => $request->get('name'),
        ]);
    }
}
