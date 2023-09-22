<?php

namespace App\Http\Middleware;

use Closure;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use function PHPSTORM_META\type;


use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty(Auth::check()))
        {
            if(Auth::user()-> User_type == 2);
            {
                return $next($request);
            }
        }
        else {

            Auth::logout();
            return redirect(url(''));
        }
    }
}
