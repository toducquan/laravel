<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use phpDocumentor\Reflection\Types\True_;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function update(User $user, Post $post){
        return $user->id === $post->created_by;
    }
    public function add(User $user){
        $roles = json_decode($user->roles);
        $flag = 0;
        foreach ($roles as $role){
            foreach ($role as $key => $value){
                if($key=="role" && $value == 2)
                    $flag = 1;
            }
        }
        if ($flag==1) return false;
        return true;
    }
    public function before($user){
        $roles = json_decode($user->roles);
        $flag = 0;
        foreach ($roles as $role){
            foreach ($role as $key => $value){
                if($key=="role" && $value == 1)
                    $flag = 1;
            }
        }
        if ($flag==1) return true;
    }
}
