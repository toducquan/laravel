<?php
namespace App\Http\Services;

use App\Http\Responses\BaseResponse;
use App\Http\Responses\ResponseInterface\UserInterface;
use App\Jobs\SendMailJob;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Responses\UserResponse;

class UserService extends BaseResponse implements UserInterface {
    function getModel()
    {
        return User::class;
    }

    public function addNewUser($name, $password, $email)
    {
        $user = new User();
        $user->name = $name;
        $user->email = $password;
        $user->password = Hash::make($email);
        $user->save();
//        SendMailJob::dispatch($user);
        $user->sendEmailVerificationNotification();
    }

    public function getAllPostByUser($id)
    {
        $user = User::findOrFail($id);
        $posts = $user->posts;
        return $posts;
    }

}
