<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\True_;

class PostPolicy
{
    public function getPost(User $user){
        $permissionList = $user->roles->pluck('permissions')->flatten();
        if ($permissionList->contains('name', 'get_post add_post'))
            return true;
        return false;
    }

    public function addPost(User $user){
        $permissionList = $user->roles->pluck('permissions')->flatten();
        if ($permissionList->contains('name', 'add_post'))
            return true;
        return false;
    }

    public function editPost(User $user, Post $post){
        $roleList = $user->roles->flatten();
        $permissionList = $user->roles->pluck('permissions')->flatten();
        if ($permissionList->contains('name', 'edit_post') && ($post->created_by == $user ->id || $roleList->contains('name', 'admin')))
            return true;
        return false;
    }

    public function deletePost(User $user, Post $post){
        $roleList = $user->roles->flatten();
        $permissionList = $user->roles->pluck('permissions')->flatten();
        if ($permissionList->contains('name', 'delete_post') && ($post->created_by == $user ->id || $roleList->contains('name', 'admin')))
            return true;
        return false;
    }
}
