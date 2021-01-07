<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }

    /*public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {
          $type_user = Auth::user()->id_type_user; 
      
          switch ($type_user) {
            case 1:
               return redirect('/order_today');
               break;

            case 2:
                return redirect('/order_today');
                break;

            case 3:
                return redirect('/order_today');
                break;

            case 4:
               return redirect('d-care');
               break; 
      
            // default:
            //    return redirect('/'); 
            //    break;
          }
        }
        return $next($request);
    }*/
}
