<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhuHuynh;
use App\Models\User;
use Illuminate\Http\Request;

class PhuHuynhController extends Controller
{
    // Xem danh sách phụ huynh
    public function index()
    {
        // Lấy tất cả bản ghi từ model Phuhuynh cùng với các quan hệ User và Treem
        $phuHuynh = PhuHuynh::with(['user', 'treEm'])->get();
        return view('admin.phuhuynh.index', compact('phuHuynh'));
    }

    // Xem chi tiết phụ huynh
    public function show(PhuHuynh $phuHuynh)
    {
        $phuHuynh->load(['user', 'treEm']);
        return view('admin.phuhuynh.show', compact('phuHuynh'));
    }

    // Chỉnh sửa thông tin phụ huynh
    public function edit(PhuHuynh $phuHuynh)
    {
        $phuHuynh->load('user');
        return view('admin.phuhuynh.edit', compact('phuHuynh'));
    }

    // Cập nhật thông tin phụ huynh
    public function update(Request $request, PhuHuynh $phuHuynh)
    {
        // Xác thực dữ liệu đầu vào từ form chỉnh sửa
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $phuHuynh->user->id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        // Cập nhật thông tin user
        $phuHuynh->user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
        ]);

        return redirect()->route('admin.phuhuynh.show', $phuHuynh)
            ->with('success', 'Cập nhật thông tin phụ huynh thành công');
    }

    // Xóa phụ huynh
    public function destroy(PhuHuynh $phuHuynh)
    {
        // Xóa user nếu tồn tại
        if ($phuHuynh->user) {
            $phuHuynh->user->delete();
        } else {
            // Nếu không có user, xóa trực tiếp phụ huynh
            $phuHuynh->delete();
        }

        return redirect()->route('admin.phuhuynh.index')
            ->with('success', 'Xóa phụ huynh thành công');
    }
}
