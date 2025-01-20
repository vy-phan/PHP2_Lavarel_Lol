<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TreEm;
use App\Models\LopHoc;
use Illuminate\Http\Request;

class HocSinhController extends Controller
{
    // Xem danh sách học sinh
    public function index()
    {
        $hocSinh = TreEm::with(['phuHuynh.user', 'lopHoc'])->get();
        return view('admin.hocsinh.index', compact('hocSinh'));
    }

    // Xem chi tiết học sinh
    public function show(TreEm $hocSinh)
    {
        $hocSinh->load(['phuHuynh.user', 'lopHoc']);
        return view('admin.hocsinh.show', compact('hocSinh'));
    }

    // Chỉnh sửa thông tin học sinh
    public function edit(TreEm $hocSinh)
    {
        $lopHoc = LopHoc::all();
        $hocSinh->load(['phuHuynh.user', 'lopHoc']);
        return view('admin.hocsinh.edit', compact('hocSinh', 'lopHoc'));
    }

    // Cập nhật thông tin học sinh
    public function update(Request $request, TreEm $hocSinh)
    {
        // Xác thực dữ liệu đầu vào từ form chỉnh sửa
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gioi_tinh' => 'required|in:Nam,Nữ',
            'dia_chi' => 'required|string|max:255',
            'lop_hoc_id' => 'nullable|exists:lop_hoc,id'
        ]);

        // Cập nhập bản ghi với dữ liệu đã xác thực
        $hocSinh->update($validated);

        // Chuyển hướng về trang chi tiết học sinh
        return redirect()->route('admin.hocsinh.show', $hocSinh)
            ->with('success', 'Cập nhật thông tin học sinh thành công');
    }

    // Xóa thông tin học sinh từ cơ sở dữ liệu 
    public function destroy(TreEm $hocSinh)
    {
        $hocSinh->delete();

        return redirect()->route('admin.hocsinh.index')
            ->with('success', 'Xóa học sinh thành công');
    }
}
