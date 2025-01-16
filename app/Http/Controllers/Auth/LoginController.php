<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    // Đặt middleware cho controller
    public function __construct()
    {
        $this->middleware('guest')->except('logout'); // Ngăn chặn người dùng đã đăng nhập truy cập vào trang đăng nhập
    }

    // Hiển thị form đăng nhập
    public function showForm()
    {
        return view('auth.dangnhap');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // Tạo lại session để bảo vệ
            $request->session()->regenerate();
            // Lấy thông tin người dùng đã đăng nhập
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.quanlytaikhoan');
            }
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không chính xác.',
        ])->onlyInput('email');
    }

    // Phương thức đăng xuất 
    public function logout(Request $request)
    {
        Auth::logout();
        // Hủy bỏ session hiện tại
        $request->session()->invalidate();
        // Tạo lại token CSRF
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
