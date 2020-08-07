<?php 
namespace App\Http\Middleware;
use Auth;
use Closure;
use Employee;
use Redirect;

class Admin {

    public function handle($request, Closure $next)
    {
    	//dd(Auth::user()->type);

        if ( Auth::check() && Auth::user()->type == 'admin' )
        {

        
           return $next($request);
        }
  //       elseif (Auth::check() && Auth::user()->role_type == 'user') {
		// 	return redirect('/admin/');
		// }

  //       return redirect('login');
         return redirect('/login');

    }

}