<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  // Hiển thị form đăng ký
  public function showDangkyForm()
  {
    return view('auth.dangky');
  }

  // Đăng ký tài khoản
  public function dangky(Request $request)
  {
    // Xác nhận
    $fields = $request->validate([
      'name' => ['required', 'max:255'],
      'email' => ['required', 'max:255', 'email', 'unique:users'],
      'password' => ['required', 'min:3', 'confirmed'],
    ]);

    // Mã hóa mật khẩu
    $fields['password'] = Hash::make($fields['password']);

    // Thêm role mặc định là 'user'
    $fields['role'] = 'user';

    // Tạo người dùng
    $user = User::create($fields);

    // Đăng nhập
    Auth::login($user);

    // Sử dụng hàm redirectTo để xác định trang chuyển hướng
    return redirect()->route('trangchu');
  }

  // Đăng nhập tài khoản
  public function dangnhap(Request $request)
  {
    // Xác nhận
    $fields = $request->validate([
      'email' => ['required', 'max:255', 'email'],
      'password' => ['required']
    ]);

    // Kiểm tra xem người dùng có tồn tại với email đã nhập
    $user = User::where('email', $fields['email'])->first();

    // Nếu người dùng tồn tại và mật khẩu đúng
    if ($user && Hash::check($fields['password'], $user->password)) {
      // Đăng nhập người dùng
      Auth::login($user, $request->remember);

      // Chuyển hướng dựa trên role
      if ($user->role === 'admin') {
        return redirect()->route('admin.trangchu');
      } elseif ($user->role === 'giaovien') {
        return redirect()->route('giaovien.trangchu');
      } else {
        return redirect()->route('trangchu');
      }
    } else {
      // Nếu không khớp, thông báo lỗi
      return back()->withErrors(['failed' => 'Tài khoản hoặc mật khẩu không đúng.']);
    }
  }

  // Đăng xuất tài khoản
  public function dangxuat(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('trangchu');
  }
}
