<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

/**
 * 记录用户最后活动
 * @author Tongle Xu <xutongle@gmail.com>
 */
class LogLastUserActivity
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
        if(Auth::check()) {
            Cache::put('user-online-' . Auth::user()->id, true, Carbon::now()->addMinutes(5));
        }
        return $next($request);
    }
}
