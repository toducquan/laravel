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
        $flag = 0;
        foreach ($user->roles as $role){
            foreach ($role->permissions as $permission){
                if($permission['name'] == 'get_post')
                    $flag = 1;
            }
        }
        if ($flag == 1) return true;
        return false;
    }

    public function addPost(User $user){
        $flag = 0;
        foreach ($user->roles as $role){
            foreach ($role->permissions as $permission){
                if($permission['name'] == 'add_post')
                    $flag = 1;
            }
        }
        if ($flag == 1) return true;
        return false;
    }

    public function editPost(User $user, Post $post){
        $flag = 0;
        foreach ($user->roles as $role){
            foreach ($role->permissions as $permission){
                if($permission['name'] == 'edit_post' && ($post->created_by == $user ->id || $role['name'] == 'admin'))
                    $flag = 1;
            }
        }
        if ($flag == 1) return true;
        return false;
    }

    public function deletePost(User $user, Post $post){
        $flag = 0;
        foreach ($user->roles as $role){
            foreach ($role->permissions as $permission){
                if($permission['name'] == 'delete_post' && ($post->created_by == $user ->id || $role['name'] == 'admin'))
                    $flag = 1;
            }
        }
        if ($flag == 1) return true;
        return false;
    }
}
