<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DangKyTuyenSinh;
use Illuminate\Http\Request;

class DangKyTuyenSinhController extends Controller
{
    // Lấy danh sách các đăng ký tuyển sinh mới nhất và phân trang
    public function index()
    {
        $registrations = DangKyTuyenSinh::latest()->paginate(10); // Lấy 10 đăng ký mới nhất theo thứ tự giảm dần
        return view('admin.tuyensinh.index', compact('registrations'));
    }

    // Hiển thị chi tiết thông tin đăng ký tuyển sinh
    public function show($dangKyTuyenSinh)
    {
        $registration = DangKyTuyenSinh::findOrFail($dangKyTuyenSinh); // Tìm đăng ký theo ID
        return view('admin.tuyensinh.show', compact('registration'));
    }

    // Cập nhập trạng thái đăng ký tuyển sinh
    public function update(Request $request, $dangKyTuyenSinh)
    {
        $registration = DangKyTuyenSinh::findOrFail($dangKyTuyenSinh);
        // Cập nhập trang thái của đăng ký
        $registration->update([
            'status' => $request->status,
            'phuhuynh_id' => $request->phuhuynh_id // Cập nhật phuhuynh_id
        ]);

        return redirect()->route('admin.quanlytaikhoan')
            ->with('success', 'Cập nhật trạng thái thành công!');
    }

    // Phê duyệt đăng ký tuyển sinh và xử lý thông tin phụ huynh, học sinh
    public function approve($dangKyTuyenSinh)
    {
        try {
            $registration = DangKyTuyenSinh::findOrFail($dangKyTuyenSinh);
            $result = $registration->approve(); // Gọi phương thức approve của model để phê duyệt
            return redirect()->route('admin.tuyensinh.index')
                ->with('success', 'Đã phê duyệt đăng ký và tạo thông tin phụ huynh, học sinh thành công!');
        } catch (\Exception $e) {
            return redirect()->route('admin.tuyensinh.index')
                ->with('error', 'Có lỗi xảy ra khi phê duyệt đăng ký: ' . $e->getMessage());
        }
    }

    // Phương thức từ chối đăng ký tuyển sinh
    public function reject($dangKyTuyenSinh)
    {
        try {
            $registration = DangKyTuyenSinh::findOrFail($dangKyTuyenSinh);
            $registration->reject();
            return redirect()->route('admin.tuyensinh.index')
                ->with('success', 'Đã từ chối đăng ký thành công!');
        } catch (\Exception $e) {
            return redirect()->route('admin.tuyensinh.index')
                ->with('error', 'Có lỗi xảy ra khi từ chối đăng ký: ' . $e->getMessage());
        }
    }
}
