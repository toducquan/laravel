<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class UserPolicy
{
    use HandlesAuthorization;

    public function getUser(User $user){
        $flag = 0;
        foreach ($user->roles as $role){
            foreach ($role->permissions as $permission){
                if($permission['name'] == 'get_user')
                    $flag = 1;
            }
        }
        if ($flag == 1) return true;
        return false;
    }

    public function deleteUser(User $user){
        $flag = 0;
        foreach ($user->roles as $role){
            foreach ($role->permissions as $permission){
                Log::info("perrr " . $permission['name']);
                if($permission['name'] == 'delete_user')
                    $flag = 1;
            }
        }
        if ($flag == 1) return true;
        return false;
    }

}
