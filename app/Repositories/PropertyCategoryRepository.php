<?php

namespace App\Repositories;

use App\Http\Requests\PropertyCategoryRequest;
use App\Models\PropertyCategory;

class PropertyCategoryRepository
{
    public function all()
    {
        return PropertyCategory::paginate(config('pagination.all'));
    }

    public function add(PropertyCategoryRequest $request)
    {
        $propertyCategories = new PropertyCategory;
        $propertyCategories->create([
            'name' => $request->get('name'),
        ]);
    }

    public function findOrFail($id)
    {
        return PropertyCategory::findOrFail($id);
    }

    public function update(PropertyCategoryRequest $request, $id)
    {
        $propertyCategories = $this->findOrFail($id);
        $validated = $request->validated();
        $propertyCategories->update([
            'name' => $request->get('name'),
        ]);
    }

    public function destroy($id)
    {
        $this->findOrFail($id)->delete();

        return true;
    }
}
