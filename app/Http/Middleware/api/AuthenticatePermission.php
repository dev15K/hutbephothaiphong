<?php

namespace App\Http\Middleware\api;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticatePermission
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return response(['status' => 'Token is Invalid'], 400);
            } else if ($e instanceof TokenExpiredException) {
                return response(['status' => 'Token is Expired'], 444);
            } else {
                return response(['status' => 'Authorization Token not found'], 401);
            }
        }
        return $next($request);
    }
}
