<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function infor(){
        return view('infor');
    }
    public function store(Request $request){
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/user/login');
    }
    public function index(Request $request){
        Post::create(["title" => "abc", "content" => "abc", "created_by" => 1]);
        $email = $request->email;
        $password = $request->password;
        Log::info("abcd" . $email .$password);

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            Log::info("mail " . Auth::user()->email);
            return redirect('/user/infor');
        }
        return redirect('/');
    }
}
