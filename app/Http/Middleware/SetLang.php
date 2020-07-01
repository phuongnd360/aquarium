<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure, Session;

class SetLang
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
        if(!empty($request->input('lang'))){
            app()->setLocale($request->input('lang'));
        }else{
            if (session()->has('locale')) {
                app()->setLocale(session()->get('locale'));
            }
        }        

        return $next($request);
    }
}
