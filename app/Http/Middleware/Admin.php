<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class Admin
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
        $user = User::find(Auth::user())->first();
        
        $is_admin = $user->authIsAdmin($user->id);
        
        if ($is_admin) {
            return $next($request);
        } else {
            $request->session()->flash('error', 'You are not allowed to see the admin area');
            return redirect("/");
        }
        
    }
}
