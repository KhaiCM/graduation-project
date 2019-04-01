<?php
namespace App\Traits;

trait HasPermissions
{
    protected $permissionsLoaded = false;

    protected $permissionList = null;

    public function hasPermission($permission = null)
    {
        if (is_null($permission)) {
            return $this->getPermissions()->count();
        }
        if (is_string($permission)) {
            return $this->getPermissions()->contains('name', $permission);
        }

        return false;
    }

    public function hasAnyPermission($permissions = null)
    {
        if (is_null($permissions)) {
            return $this->getPermissions()->count();
        }

        if (is_string($permissions)) {
            if (false !== strpos($permissions, '|')) {
                $permissions = $this->convertStringToArray($permissions);
            } else {
                $permissions = [$permissions];
            }

            foreach ($permissions as $permission) {
                if ($this->hasPermission($permission)) {
                    return true;
                }
            }
        }

        return false;
    }

    public function hasAllPermissions($permissions)
    {
        if (is_string($permissions)) {
            if (false !== strpos($permissions, '|')) {
                $permissions = $this->convertStringToArray($permissions);
            } else {
                $permissions = [$permissions];
            }

            $permissions = collect()->make($permissions);

            return $permissions->intersect($this->getPermissionNames()) == $permissions;
        }

        return false;
    }

    private function getPermissions()
    {
        if (! $this->permissionsLoaded) {
            if (get_class($this) == $this->roleModel) {
                $this->permissionList = $this->permissions;
            } else {
                if (! $this->roles->first()->relationLoaded('permissions')) {
                    $this->roles->load('permissions');
                }

                $this->permissionList = $this->roles->pluck('permissions')->flatten();
            }
        }

        return $this->permissionList;
    }

    private function getPermissionNames()
    {
        return $this->getPermissions()->pluck('name');
    }

    protected function convertStringToArray($string)
    {
        $array = explode('|', $string);
        $array = array_map('trim', $array);
        $array = array_unique(array_filter($array));

        return $array;
    }
}
