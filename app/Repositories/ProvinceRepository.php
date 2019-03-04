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
    public function findOrFail($id)
    {
        return Province::findOrFail($id);
    }
    public function update(ProvinceRequest $request, $id)
    {
        $province = $this->findOrFail($id);
        $validated = $request->validated();
        $province->update([
            'name' => $request->get('name'),
        ]);
    }
    public function destroy($id)
    {
        $this->findOrFail($id)->delete();

        return true;
    }
}
