<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class CheckadminMiddleware
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
        if(Auth::user()->quyen == 1){
            return back()->with('thongbao','Bạn vui lòng liện hệ Admin tổng để có quyền truy cập quản lý Users');
        }
        else{
            return $next($request);
        }
        
    }
}
