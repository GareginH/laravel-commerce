<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\DB;
use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $admin = DB::table('roles_user')->where('user_id', auth()->user()->id)->get();

        if(count($admin) > 0){
            return $next($request);
        }
        else{
            return abort(403);
        }
        
    }
}
