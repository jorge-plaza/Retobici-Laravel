<?php

namespace App\Http\Middleware;

use App\Exceptions\SactumAuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * @throws SactumAuthenticationException
     */
    protected function unauthenticated($request, array $guards)
    {
        throw new SactumAuthenticationException("To access this endpoint you need to be authenticated",401);
    }
}
