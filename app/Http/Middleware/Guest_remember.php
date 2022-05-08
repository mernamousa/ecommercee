<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Str;


class Guest_remember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //session()->forget('remember_token');
        $remember_token = Str::random(20);
        if (empty(Session::get('remember_token'))) {
            User::create([
                "remember_token" => $remember_token,
            ]);
            Session::put('remember_token', $remember_token);
        }

        return $next($request);
    }
}
