<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\ApiTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        $user=Auth::guard('sanctum')->user();

if ( !$request->header('Authorization')) {
    return  ApiTraits::errorMessage("you are not authorize only user type admin have token chick you pass coorect token",504);

}elseif($user->type !=="admin"){
    return  ApiTraits::errorMessage("you are noy authorize only user type admin  have token chick you pass coorect token",504);

}
else{
    return $next($request);

}

    }
}
