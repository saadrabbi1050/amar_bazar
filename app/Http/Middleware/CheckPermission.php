<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
   
    public function handle(Request $request, Closure $next): Response
    {
        $age = 10;

        if($age == 10){
            return $next($request);
        }else{
           return redirect()->to('/');
        }

    }
}
