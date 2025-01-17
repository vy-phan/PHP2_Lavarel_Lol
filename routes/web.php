<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\TuyenSinhController;
use App\Http\Controllers\Admin\DangKyTuyenSinhController;
use App\Models\DangKyTuyenSinh;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public routes - không cần đăng nhập
Route::get('/', function () {
    // Kiểm tra người dùng đã đăng nhập và có vai trò là admin thì chuyển đến trang quản trị
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('admin.quanlytaikhoan');
    }
    return view('clients.trangchu');
})->name('trangchu');

// Route riêng cho trang chủ client không redirect admin
Route::get('/home', function () {
    return view('clients.trangchu');
})->name('client.trangchu');



// Tuyển sinh routes
Route::get('/tuyen-sinh', [TuyenSinhController::class, 'index'])->name('tuyensinh');
// Xử lý dữ liệu gửi lên từ form đăng ký tuyển sinh
Route::post('/tuyen-sinh', [TuyenSinhController::class, 'store'])->name('tuyensinh.store');

Route::get('/lop-hoc', function () {
    return view('clients.lophoc');
})->name('lophoc');

Route::get('/tin-tuc-va-su-kien', function () {
    return view('clients.tintuc_sukien');
})->name('tintuc');

Route::get('/lien-he', function () {
    return view('clients.lienhe');
})->name('lienhe');

Route::post('/lien-he', [App\Http\Controllers\LienHeController::class, 'store'])->name('lienhe.store');

// Authentication routes - thêm middleware guest
Route::middleware('guest')->group(function () {
    // Hiển thị form đăng nhập
    Route::get('/dangnhap', [LoginController::class, 'showForm'])->name('dangnhap.show');
    // Xử lý đăng nhập từ form đăng nhập
    Route::post('/dangnhap', [LoginController::class, 'login'])->name('dangnhap');
    // Hiển thị form đăng ký
    Route::get('/dangky', [AuthController::class, 'showDangkyForm'])->name('dangky.show');
    // Xử lý đăng ký từ form đăng ký
    Route::post('/dangky', [AuthController::class, 'dangky'])->name('dangky');
});

// Protected routes - cần đăng nhập
Route::group(['middleware' => ['auth']], function () {
    // Thông tin phụ huynh và học sinh - chỉ user đã đăng nhập mới xem được
    Route::get('/thong-tin-phu-huynh', function () {
        return view('clients.phuhuynh');
    })->name('thongtinphuhuynh');

    Route::get('/thong-tin-hoc-sinh', function () {
        return view('clients.hocsinh');
    })->name('thongtinhocsinh');

    // Đăng xuất
    Route::post('/dangxuat', [AuthController::class, 'dangxuat'])->name('dangxuat');
});

// Admin routes
Route::middleware(['auth', 'auth.admin'])->name('admin.')->prefix('admin')->group(function () {
    // Quản lý tài khoản
    Route::get('/', function () {
        $users = \App\Models\User::all();
        // Lấy danh sách email và trạng thái từ bảng đăng ký tuyển sinh
        $registrations = \App\Models\DangKyTuyenSinh::select('email', 'status')
            ->whereNotNull('email')
            ->get()
            ->groupBy('email')
            ->map(function ($items) {
                return $items->contains('status', 'approved');
            });

        return view('admin.quanlytaikhoan', compact('users', 'registrations'));
    })->name('quanlytaikhoan');

    // Quản lý tuyển sinh
    Route::get('/quan-ly-tuyen-sinh', function () {
        $pendingRegistrations = DangKyTuyenSinh::where('status', 'pending')->count();
        $latestRegistrations = DangKyTuyenSinh::latest()->take(5)->get();

        return view('admin.tuyensinh', compact('pendingRegistrations', 'latestRegistrations'));
    })->name('tuyensinh');

    // Quản lí phản hồi
    Route::get('/quan-ly-phan-hoi', [App\Http\Controllers\Admin\FeedbackController::class, 'index'])->name('phanhoi');

    // Chỉnh sửa tài khoản
    Route::get('/tai-khoan/chinh-sua/{user}', function (\App\Models\User $user) {
        return view('admin.taikhoan.chinhsua', compact('user'));
    })->name('taikhoan.chinhsua');

    Route::put('/tai-khoan/cap-nhat/{user}', function (\App\Models\User $user) {
        $validated = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,user,giaovien'
        ]);

        Log::info('Cập nhật tài khoản:', [
            'user_id' => $user->id,
            'old_data' => $user->toArray(),
            'new_data' => $validated
        ]);

        $user->update($validated);

        return redirect()->route('admin.quanlytaikhoan')->with('success', 'Cập nhật tài khoản thành công');
    })->name('taikhoan.update');

    // Xóa tài khoản
    Route::delete('/tai-khoan/xoa/{user}', function (\App\Models\User $user) {
        if ($user->role === 'admin') {
            return back()->with('error', 'Không thể xóa tài khoản admin');
        }
        $user->delete();
        return back()->with('success', 'Xóa tài khoản thành công');
    })->name('taikhoan.delete');


    // Quản lý đăng ký tuyển sinh
    Route::get('/tuyen-sinh', [DangKyTuyenSinhController::class, 'index'])->name('tuyensinh.index'); // Hiển thị danh sách đăng ký tuyển sinh
    Route::get('/tuyen-sinh/{dangKyTuyenSinh}', [DangKyTuyenSinhController::class, 'show'])->name('tuyensinh.show'); // Hiển thị chi tiết đăng ký tuyển sinh
    Route::put('/tuyen-sinh/{dangKyTuyenSinh}', [DangKyTuyenSinhController::class, 'update'])->name('tuyensinh.update'); // Cập nhập thông tin đăng ký tuyển sinh
});
