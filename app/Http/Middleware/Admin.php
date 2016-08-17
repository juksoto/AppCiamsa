<?php

namespace App\Http\Middleware;

use Closure;
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
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user -> is_admin == true )
            {
                    return $next($request);
            }
            else
            {
                if (($request->url() == route('admin.register.index')) or ($request->url() == route('admin.register.report'))  )
                {
                    return $next($request);
                }
                else
                    {
                        return redirect() -> route('admin.register.index');
                    }
            }

        }
        else
        {
            if($request -> ajax() and ($request->url() == route('admin.tsProducts.show'))){
                return $next($request);
            }
            else
            {
                return redirect() -> route('dashboard');
            }
        }

    }
}
