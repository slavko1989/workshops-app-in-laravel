<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserMiddleware
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

    if(Auth::check() && Auth::user()->status){
    $baned = Auth::user()->status=="1";
    Auth::logout();

    if($baned==1){
       $message ='Your account is baned, Please contact the admin'; 
    }
    return redirect()->route('login')->with('status',$message)->with('message','Baned account');

        }
        return $next($request);
    }
        
    
}
