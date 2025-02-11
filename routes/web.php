<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\TuyenSinhController;
use App\Http\Controllers\Admin\DangKyTuyenSinhController;
use App\Models\DangKyTuyenSinh;
use App\Http\Controllers\ProfileController;

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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route riêng cho trang chủ client không redirect admin
Route::get('/home', function () {
    return view('clients.trangchu');
})->name('client.trangchu');

// Client routes
Route::get('/tin-tuc-su-kien', [App\Http\Controllers\TinTucController::class, 'clientIndex'])
    ->name('tintuc.sukien');

// Tuyển sinh routes
Route::get('/tuyen-sinh', [TuyenSinhController::class, 'index'])->name('tuyensinh');
// Xử lý dữ liệu gửi lên từ form đăng ký tuyển sinh
Route::post('/tuyen-sinh', [TuyenSinhController::class, 'store'])->name('tuyensinh.store');

Route::get('/lop-hoc', function () {
    return view('clients.lophoc');
})->name('lophoc');

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

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    // Tin tức & Sự kiện
});

// Admin routes
Route::middleware(['auth', 'auth.admin'])->name('admin.')->prefix('admin')->group(function () {
    // Quản lý tài khoản
    Route::get('/taikhoan', function () {
        $users = \App\Models\User::all();
        // Lấy danh sách email và trạng thái từ bảng đăng ký tuyển sinh
        $registrations = \App\Models\DangKyTuyenSinh::select('email', 'status')
            ->whereNotNull('email')
            ->get()
            ->groupBy('email')
            ->map(function ($items) {
                return $items->contains('status', 'approved');
            });

        return view('admin.taikhoan.quanlytaikhoan', compact('users', 'registrations'));
    })->name('quanlytaikhoan');

    // Quản lý tuyển sinh
    Route::get('/quan-ly-tuyen-sinh', function () {
        $pendingRegistrations = DangKyTuyenSinh::where('status', 'pending')->count();
        $latestRegistrations = DangKyTuyenSinh::latest()->take(5)->get();

        return view('admin.tuyensinh.tuyensinh', compact('pendingRegistrations', 'latestRegistrations'));
    })->name('tuyensinh');

    // Quản lí phản hồi
    Route::get('/quan-ly-phan-hoi', [App\Http\Controllers\Admin\FeedbackController::class, 'index'])->name('phanhoi');

    // Quản lý tin tức 
    Route::get('/quan-ly-tin-tuc', [App\Http\Controllers\Admin\TinTucController::class, 'index'])->name('tintuc');
    Route::get('/quan-ly-tin-tuc/create', [App\Http\Controllers\Admin\TinTucController::class, 'create'])->name('tintuc.create');
    Route::post('/quan-ly-tin-tuc', [App\Http\Controllers\Admin\TinTucController::class, 'store'])->name('tintuc.store');
    Route::get('/quan-ly-tin-tuc/{tintuc}/edit', [App\Http\Controllers\Admin\TinTucController::class, 'edit'])->name('tintuc.edit');
    Route::put('/quan-ly-tin-tuc/{tintuc}', [App\Http\Controllers\Admin\TinTucController::class, 'update'])->name('tintuc.update');
    Route::delete('/quan-ly-tin-tuc/{tintuc}', [App\Http\Controllers\Admin\TinTucController::class, 'destroy'])->name('tintuc.destroy');

    // Quản lý sự kiện
    Route::get('/quan-ly-su-kien', [App\Http\Controllers\Admin\SuKienController::class, 'index'])->name('sukien');
    Route::get('/quan-ly-su-kien/create', [App\Http\Controllers\Admin\SuKienController::class, 'create'])->name('sukien.create');
    Route::post('/quan-ly-su-kien', [App\Http\Controllers\Admin\SuKienController::class, 'store'])->name('sukien.store');
    Route::get('/quan-ly-su-kien/{sukien}/edit', [App\Http\Controllers\Admin\SuKienController::class, 'edit'])->name('sukien.edit');
    Route::put('/quan-ly-su-kien/{sukien}', [App\Http\Controllers\Admin\SuKienController::class, 'update'])->name('sukien.update');
    Route::delete('/quan-ly-su-kien/{sukien}', [App\Http\Controllers\Admin\SuKienController::class, 'destroy'])->name('sukien.destroy');

    // Quản lý phụ huynh
    Route::get('/phuhuynh', [App\Http\Controllers\Admin\PhuHuynhController::class, 'index'])->name('phuhuynh.index');
    Route::get('/phuhuynh/{phuHuynh}', [App\Http\Controllers\Admin\PhuHuynhController::class, 'show'])->name('phuhuynh.show');
    Route::get('/phuhuynh/{phuHuynh}/edit', [App\Http\Controllers\Admin\PhuHuynhController::class, 'edit'])->name('phuhuynh.edit');
    Route::put('/phuhuynh/{phuHuynh}', [App\Http\Controllers\Admin\PhuHuynhController::class, 'update'])->name('phuhuynh.update');
    Route::delete('/phuhuynh/{phuHuynh}', [App\Http\Controllers\Admin\PhuHuynhController::class, 'destroy'])->name('phuhuynh.destroy');

    // Quản lý học sinh
    Route::get('/hocsinh', [App\Http\Controllers\Admin\HocSinhController::class, 'index'])->name('hocsinh.index');
    Route::get('/hocsinh/{hocSinh}', [App\Http\Controllers\Admin\HocSinhController::class, 'show'])->name('hocsinh.show');
    Route::get('/hocsinh/{hocSinh}/edit', [App\Http\Controllers\Admin\HocSinhController::class, 'edit'])->name('hocsinh.edit');
    Route::put('/hocsinh/{hocSinh}', [App\Http\Controllers\Admin\HocSinhController::class, 'update'])->name('hocsinh.update');
    Route::delete('/hocsinh/{hocSinh}', [App\Http\Controllers\Admin\HocSinhController::class, 'destroy'])->name('hocsinh.destroy');

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

    // Quản lý tin tức
    Route::resource('tin-tuc', App\Http\Controllers\Admin\TinTucController::class)->names([
        'index' => 'tintuc.index',
        'create' => 'tintuc.create',
        'store' => 'tintuc.store',
        'edit' => 'tintuc.edit',
        'update' => 'tintuc.update',
        'destroy' => 'tintuc.destroy'
    ]);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

// Routes cho tin tức và sự kiện
Route::get('/tin-tuc-su-kien', [App\Http\Controllers\TinTucSuKienController::class, 'index'])->name('tintuc_sukien');
Route::get('/tin-tuc/{id}', [App\Http\Controllers\TinTucSuKienController::class, 'tinTucDetail'])->name('tintuc.detail');
Route::get('/su-kien/{id}', [App\Http\Controllers\TinTucSuKienController::class, 'suKienDetail'])->name('sukien.detail');
