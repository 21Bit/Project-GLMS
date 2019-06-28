<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;

class StudentMiddleware
{
   protected  $auth;


    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if($request->ajax()) {
                return response('Unauthorize.', 401);
            }else {
                return redirect()->guest('login');
            }
        }else{
            if($this->auth->user()->type == "student"){
                return $next($request);
            }else{
                if($this->auth->user()->type == "teacher") {
                    return redirect()->route('teacher.dashboard');
                }else{
                    return redirect()->guest('login');
                }   
            }
        }
    }
}
