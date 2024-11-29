<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthenticatedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has("authenticate_token")) {

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('auth:login:view');

        } else {
            if (User::where("login_token", $request->session()->get('authenticate_token'))->doesntExist()) {
                $request->session()->invalidate();

                $request->session()->regenerateToken();

                return redirect()->route('auth:login:view');
            }
        }
        return $next($request);
    }
}
