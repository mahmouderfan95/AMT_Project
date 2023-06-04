<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(\Illuminate\Http\Request $request): ?string
    {

        if(Request::is('admin*'))
            return route('admin.login');
        else
            return route('login');
//        return $request->expectsJson() ? null : route('admin.login');
    }
}
