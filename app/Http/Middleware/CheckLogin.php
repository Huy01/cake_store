<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\registerArgumentsSet;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if(Auth::check())
        // {
        //     $user=Auth::user();
        //     if($user->level==1 || $user->level==2){
        //         return $next($request);
        //     }
        // }
        // else{
        //     return redirect()->route('sign_in');
        // }
        
        
        
            
        if ($request->input('email') !== 'admin123@gmail.com') {
            return redirect('admin/sign-in');
        }

        return $next($request);

        
    }
}
