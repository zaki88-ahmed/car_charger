<?php

namespace App\Http\Middleware;


use App\Http\Traits\ApiDesignTrait;
use Closure;
use Illuminate\Http\Request;
use JWTAuth;
use Exception;

class JwtToken
{

    use ApiDesignTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        return $next($request);


        try{

            JWTAuth::parseToken()->Authenticate();

        }catch (Exception $e){

            if($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return $this->ApiResponse(422, 'this token is expired');
            }elseif ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return $this->ApiResponse(422, 'this token is Invalid');

            }else {
                return $this->ApiResponse(422, 'this token is not found');
            }

        }

        return $next($request);
    }
}
