<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\Property;
class PropertyRepository extends EloquentRepository
{
    function model()
    {
        return 'App\Models\Property';
    }

    public function findOrFail($id)
    {
        return Property::findOrFail($id);
    }
}
