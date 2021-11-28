<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $this->setCookieLogin($request);

        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }

    private function setCookieLogin($request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            
            $config = config('session');

            $time = time() + $config['lifetime'] * 60;

            setcookie('ef_e', base64_encode($request->email), $time, "", "", true);
            setcookie('ef_s', base64_encode($request->password), $time, "", "", true);
        }

        if (!$request->remember) {
            setcookie('ef_e', null, -1);
            setcookie('ef_s', null, -1);
        }
    }
}
