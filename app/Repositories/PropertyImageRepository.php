<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\PropertyImage;
class PropertyImageRepository extends EloquentRepository
{
    function model()
    {
        return 'App\Models\PropertyImage';
    }

    public function findOrFail($id)
    {
        return Property::findOrFail($id);
    }
}
