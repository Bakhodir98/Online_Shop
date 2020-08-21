<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class CheckIsAdmin
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
        $user = Auth::user();
        // dd('i hate you');

        if (!($user->is_admin === 1)) {
            session()->flash('warning', 'У вас нет прав админа');
            return redirect()->route('index');
        }
        return $next($request);
    }
}