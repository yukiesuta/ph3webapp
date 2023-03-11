<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class PermitOnlyAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::user()->admin === 0) {
            // adminじゃないことを示すページへリダイレクト
            return redirect('/notadmin');
            
            // ユーザーがフォームを送信した後に、成功した場合にユーザーをホームページにリダイレクト
            // return redirect(RouteServiceProvider::HOME);
        }
        
        return $next($request);
    }
}
