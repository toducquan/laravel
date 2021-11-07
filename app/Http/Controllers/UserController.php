<?php

namespace App\Http\Controllers;

use App\Http\Responses\ResponseInterface\UserInterface;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Services\UserService;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserInterface $userService)
    {
        $this->userService = $userService;
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
        $users = $this->userService->getAll();
        if (Auth::user()->cannot('getUser', User::class))
            return redirect('/view/login');
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
            if (Auth::user()->can('getUser', User::class))
                return redirect('/view/admin');
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
        $this->userService->destroy($id);
        return back();
    }
}
