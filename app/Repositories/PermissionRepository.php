<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\Permission;
class PermissionRepository extends EloquentRepository
{
    function model()
    {
        return 'App\Models\Permission';
    }

    public function findOrFail($id)
    {
        return Permission::findOrFail($id);
    }
}
