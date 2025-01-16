<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Lấy URL trước đó
                $previousUrl = url()->previous();
                
                // Nếu đã đăng nhập rồi mà chuyển hướng đăng nhập/đăng ký thì quay về chính trang đó
                if (str_contains($previousUrl, 'tuyen-sinh')) {
                    return redirect()->route('tuyensinh');
                } 
                if (str_contains($previousUrl, 'lop-hoc')) {
                    return redirect()->route('lophoc');
                } 
                if (str_contains($previousUrl, 'thong-tin-phu-huynh')) {
                    return redirect()->route('thongtinphuhuynh');
                } 
                if (str_contains($previousUrl, 'thong-tin-hoc-sinh')) {
                    return redirect()->route('thongtinhocsinh');
                }
                if (str_contains($previousUrl, 'tin-tuc-va-su-kien')) {
                    return redirect()->route('tintuc');
                }
                if (str_contains($previousUrl, 'lien-he')) {
                    return redirect()->route('lienhe');
                }
                
                // Nếu không phải từ trang protected nào, về trang chủ
                return redirect()->route('trangchu');
            }
        }

        return $next($request);
    }
}
