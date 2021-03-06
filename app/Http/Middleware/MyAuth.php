<?php

namespace App\Http\Middleware;

require_once(__DIR__ ."/../../Libs/jwt.php");
use Closure;
session_start();
class MyAuth
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
        // session_unset();
        if(isset($_SESSION['token'])) {
            if(verifyJWT($_SESSION['token']))
                return $next($request);
        } 
        return redirect("http://localhost:8000/#open-login-modal");     
    }
}
