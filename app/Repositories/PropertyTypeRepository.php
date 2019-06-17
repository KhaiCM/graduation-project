<?php

namespace App\Repositories;

use App\Models\PropertyType;
use App\Http\Requests\PropertyTypeRequest;

class PropertyTypeRepository
{
    public function all()
    {
        return PropertyType::paginate(config('pagination.all'));
    }

    public function add(PropertyTypeRequest $request)
    {
        $district = new PropertyType;
        $district->create([
            'name' => $request->get('name'),
            'status' => 'pending',
            'property_category_id' => $request->get('property_category_id'),
        ]);
    }

    public function findOrFail($id)
    {
        return PropertyType::findOrFail($id);
    }

    public function update(PropertyTypeRequest $request, $id)
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
