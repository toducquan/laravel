<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class UserPolicy
{
    use HandlesAuthorization;

    public function getUser(User $user){
        $permissionList = $user->roles->pluck('permissions')->flatten();
        if ($permissionList->contains('name', 'get_user'))
            return true;
        return false;
    }

    public function deleteUser(User $user){
        $permissionList = $user->roles->pluck('permissions')->flatten();
        if ($permissionList->contains('name', 'delete_user'))
            return true;
        return false;
    }

}
