<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    public function handle($request, Closure $next)
    {
        return $next($request)
          // Url that will be given access in requests.
          ->header(
              "Access-Control-Allow-Origin", 
              "*"
          )

          // Methods that are given access.
          ->header(
              "Access-Control-Allow-Methods", "GET"
          )

          // Headers of the petition.
          ->header(
              "Access-Control-Allow-Headers", 
              "X-Requested-With, Content-Type, 
              X-Token-Auth, Authorization"
          ); 
    }
}