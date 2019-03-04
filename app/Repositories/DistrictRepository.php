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

    public function findOrFail($id)
    {
        return District::findOrFail($id);
    }

    public function update(DistrictRequest $request, $id)
    {
        $district = $this->findOrFail($id);
        $validated = $request->validated();
        $district->update([
            'name' => $request->get('name'),
            'provinces_id' => $request->get('provinces_id'),
        ]);
    }

    public function destroy($id)
    {
        $this->findOrFail($id)->delete();

        return true;
    }
}

