<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThongBaoSuKien;
use Illuminate\Http\Request;

class SuKienController extends Controller
{
    public function index()
    {
        $sukien = ThongBaoSuKien::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.tintuc_sukien.sukien', compact('sukien'));
    }

    public function create()
    {
        return view('admin.tintuc_sukien.create_sukien');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tieu_de' => 'required|max:255',
            'mo_ta' => 'required',
            'ngay_dien_ra' => 'required|date',
            'thoi_gian_bat_dau' => 'required',
            'thoi_gian_ket_thuc' => 'required',
            'trang_thai' => 'required'
        ]);

        ThongBaoSuKien::create($request->all());

        return redirect()->route('admin.sukien')
            ->with('success', 'Sự kiện đã được thêm thành công.');
    }

    public function edit($id)
    {
        $sukien = ThongBaoSuKien::findOrFail($id);
        return view('admin.tintuc_sukien.edit_sukien', compact('sukien'));
    }

    public function update(Request $request, $id)
    {
        $sukien = ThongBaoSuKien::findOrFail($id);
        
        $request->validate([
            'tieu_de' => 'required|max:255',
            'mo_ta' => 'required',
            'ngay_dien_ra' => 'required|date',
            'thoi_gian_bat_dau' => 'required',
            'thoi_gian_ket_thuc' => 'required',
            'trang_thai' => 'required'
        ]);

        $sukien->update($request->all());

        return redirect()->route('admin.sukien')
            ->with('success', 'Sự kiện đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $sukien = ThongBaoSuKien::findOrFail($id);
        $sukien->delete();

        return redirect()->route('admin.sukien')
            ->with('success', 'Sự kiện đã được xóa thành công.');
    }
}
