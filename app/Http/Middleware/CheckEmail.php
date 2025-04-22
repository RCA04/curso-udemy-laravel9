<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->check()){
            return redirect(route('login.form'));
        } 
        $email=auth()->user()->email;
        $data = explode('@', $email);
        $servidorEmail = $data[1];

        if($servidorEmail != 'gmail.com'){
            return redirect(route('login.form'));
        }

        return $next($request);
    }
}
