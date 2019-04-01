<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use App\Repositories\RoleRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\UserPageRepository;

class RoleController extends Controller
{
	protected $role;
	protected $permission;
	protected $user;

	public function __construct(RoleRepository $role, PermissionRepository $permission, UserPageRepository $user)
	{
		$this->role = $role;
		$this->permission = $permission;
		$this->user = $user;
	}
	public function getRole()
	{
		$role = Role::all();
		$permission = Permission::all();
		
		return view('backend.roles.index', compact('permission', 'role'));
	}

	public function postRole(Request $request)
	{
		$role = $this->role->create($request->all());

		return redirect(route('role.index'))->with('message', __('message.add_role_success'));
	}

	public function postPermission(Request $request)
	{
		$role = $this->permission->create($request->all());

		return redirect(route('role.index'))->with('message', __('message.add_permission_success'));
	}

	public function setPermission(Request $request)
	{
		$role = $this->role->findOrFail($request->role_id);
		$permission = $request->permission_id;
		$role->permissions()->sync($permission);
		
		return redirect(route('role.index'))->with('message', __('message.add_permission_success'));
	}

		public function setRole(Request $request, $id)
	{
		$user = $this->user->findOrFail($request->id);
		$role = $request->role_id;
		$user->role()->sync($role);
		
		return redirect(route('user.list'))->with('message', __('message.edit_role_success'));
	}

}
