<?php

namespace App\Http\Services;

use App\Http\Responses\RoleResponse;
use App\Role;

class RoleService extends RoleResponse
{

    public function addNewRole($user_id, $role)
    {
        $user_role = new Role();
        $user_role->user_id = $user_id;
        $user_role->role = $role;
        $user_role->save();
    }

    public function deleteRole($id)
    {
        $user_role = Role::findOrFail($id);
        $user_role->delete();
    }

    public function getAllRole()
    {
        return Role::all();
    }
}
