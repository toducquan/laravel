<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Services\UserService;

class UserController extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = app('UserService');
    }

    public function loginView()
    {
        return view('login');
    }
    public function registerView()
    {
        return view('register');
    }
    public function adminView(){
        $users = $this->userService->getAllUser();
        return view('admin', [
            "users" => $users
        ]);
    }
    public function register(Request $request)
    {
        $this->userService->addNewUser($request->name, $request->email, $request->password);
        return redirect('/view/login');
    }
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            $roles = json_decode($user->roles);
            foreach ($roles as $role){
                foreach ($role as $key => $value){
                    if($key=="role" && $value == 1)
                        return redirect('/view/admin');
                }
            }
            return redirect('/view/infor');
        }
        return redirect('/view/login');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/view/login');
    }
    public function destroy($id)
    {
        $this->userService->deleteUserById($id);
        return back();
    }
}
