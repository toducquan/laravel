<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        $user->password = $request->password;
        $user->save();
        return redirect('/user/login');
    }
    public function index(Request $request){
        $email = $request->email;
        $password = $request->password;
        // dd($request->all());
        // dd(Auth::attempt(['email' => $email, 'password' => $password]), $email, $password);
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            Log::info("abcd" . $email);
            // $request->session()->regenerate();
            return redirect('/user/infor');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
