<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }

        // Lưu URL hiện tại vào session trước khi chuyển hướng
        if (str_contains($request->path(), 'thong-tin-hoc-sinh') || 
            str_contains($request->path(), 'thong-tin-phu-huynh')) {
            session(['url.intended' => $request->url()]);
        }

        return route('dangnhap.show');
    }
}
