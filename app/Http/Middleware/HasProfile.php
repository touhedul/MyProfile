<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasProfile
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
        if(!$request->user()->has_profile) {
            notify()->info(__("Complete your profile please"), __(""));
            return redirect()->route('admin.users.createProfilePage');
       }
       return $next($request);
    }
}
