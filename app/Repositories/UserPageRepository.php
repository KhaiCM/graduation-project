<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\EloquentRepository;
use App\Http\Requests\UserPageRequest;
use App\Http\Requests\ChangePassRequest;

class UserPageRepository extends EloquentRepository
{
    function model()
    {
        return 'App\Models\User';
    }

    public function findOrFail($id)
    {
        return User::findOrFail($id);
    }
}

