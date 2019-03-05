<?php

namespace App\Repositories;

use App\Models\User;
use App\Http\Requests\UserPageRequest;

class UserPageRepository
{
    public function findOrFail($id)
    {
        return User::findOrFail($id);
    }
    public function update(UserPageRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $validated = $request->validated();
        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
        ]);
    }
}
