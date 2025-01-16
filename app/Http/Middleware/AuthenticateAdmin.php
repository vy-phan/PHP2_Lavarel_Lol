<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     // Xử lý yêu cầu HTTP để kiểm tra quyền truy cập 
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user(); // Lấy thông tin người dùng hiện tại
        // Kiểm tra xem người dùng hiện tại có phải là quản trị viên (role = admin) không.
        if (!$user || $user->role !== 'admin') {
            return redirect('/');
        }
        return $next($request);
    }
}
