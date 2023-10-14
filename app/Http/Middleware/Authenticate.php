<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
        if($request->routeIs('medecin.*')){
            return route('medecin.login');
        }
        if($request->routeIs('fournisseur.*')){
            return route('fournisseur.login');
        }
        if($request->routeIs('patient.*')){
            return route('patient.login');
        }
        if($request->routeIs('pharmacien.*')){
            return route('pharmacien.login');
        }
    }
}
