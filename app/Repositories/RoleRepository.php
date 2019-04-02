<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\Role;
class RoleRepository extends EloquentRepository
{
    function model()
    {
        return 'App\Models\Role';
    }

    public function findOrFail($id)
    {
        return Role::findOrFail($id);
    }
}
