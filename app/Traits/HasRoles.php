<?php
namespace App\Traits;

trait HasRoles
{
    use HasPermissions;

    protected $roleModel = 'App\Models\Role';

    protected $superAdminRole = 'super_admin';

    public function roles()
    {
        return $this->belongsToMany($this->roleModel);
    }

    public function isSuperAdmin()
    {
        return $this->hasRole($this->superAdminRole);
    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return false;
    }

    public function hasAnyRole($roles)
    {
        if (is_string($roles)) {
            if (false !== strpos($roles, '|')) {
                $roles = $this->convertStringToArray($roles);
            } else {
                $roles = [$roles];
            }

            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        }

        return false;
    }

    public function hasAllRoles($roles)
    {
        if (is_string($roles)) {
            if (false !== strpos($roles, '|')) {
                $roles = $this->convertStringToArray($roles);
            } else {
                $roles = [$roles];
            }

            $roles = collect()->make($roles);

            return $roles->intersect($this->getRoleNames()) == $roles;
        }

        return false;
    }

    private function getRoleNames()
    {
        return $this->roles->pluck('name');
    }
}
