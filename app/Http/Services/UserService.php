<?php
namespace App\Http\Services;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Responses\UserResponse;

class UserService extends UserResponse{
    public function addNewUser($name, $password, $email){
        $user = new User();
        $user->name = $name;
        $user->email = $password;
        $user->password = Hash::make($email);
        $user->save();
    }
    public function getAllUser(){
        return User::all();
    }
    public function getUserWithId($id){
        return User::find($id);
    }
    public function deleteUserById($id){
        $user = User::find($id);
        $user->delete();
    }

    public function getAllPostByUser($id)
    {
        $user = User::findOrFail($id);
        $posts = $user->posts;
        return $posts;
    }
}
