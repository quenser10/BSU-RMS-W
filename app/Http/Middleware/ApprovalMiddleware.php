<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApprovalMiddleware
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
        
        if(auth()->guard('admin')->check()){
            
            if(auth()->guard('admin')->user()->approved == 0){
                
                auth()->guard('admin')->logout();

                return redirect('/admin')->with('message', 'Your account needs to be verified, approved and activated by the admin in charge.');
            }
        }
        
        return $next($request);
    }
}
