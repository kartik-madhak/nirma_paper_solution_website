<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::check()) {
            $user = Auth::user();
            $email = Auth::user()->email;

            if($email==env('WEBSITE_OWNER_EMAIL'))
            {
              //  dd($email);
                return $next($request);
            }
            else
            {
                abort(404);
            }
        }
        else{
            abort(404);
        }


    }
}
