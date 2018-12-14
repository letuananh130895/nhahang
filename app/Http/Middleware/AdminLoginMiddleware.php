<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AdminLoginMiddleware
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
        if(Auth::check())
        {
            if(Auth::user()->quyen == 0){
                return redirect('admin/dangnhap')->with('thongbao','Bạn không có quyền truy cập');
            }
            return $next($request);
        }
        else{
            return redirect('admin/dangnhap')->with('thongbao','Vui lòng đăng nhập');
        }
        
    }
}
