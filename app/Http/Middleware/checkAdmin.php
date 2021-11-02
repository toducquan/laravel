<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $roles = json_decode($user->roles);
        $flag = 0;
        foreach ($roles as $role){
            foreach ($role as $key => $value){
                if($key=="role" && $value == 1)
                    $flag = 1;
            }
        }
        if($flag != 1){
            return redirect('/view/infor');
        }
        return $next($request);
    }
}
