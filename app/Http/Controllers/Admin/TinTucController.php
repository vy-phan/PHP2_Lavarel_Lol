<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TinTuc;
use Illuminate\Http\Request;

class TinTucController extends Controller
{
    public function index()
    {
        $tintuc = TinTuc::with('user')
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
        return view('admin.tintuc_sukien.tintuc', compact('tintuc'));
    }

    public function create()
    {
        return view('admin.tintuc_sukien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tieu_de' => 'required|max:255',
            'noi_dung' => 'required',
            'ngay_dang' => 'required|date',
        ]);

        $tintuc = new TinTuc();
        $tintuc->tieu_de = $request->tieu_de;
        $tintuc->noi_dung = $request->noi_dung;
        $tintuc->ngay_dang = $request->ngay_dang;
        $tintuc->user_id = auth()->id();
        $tintuc->save();

        return redirect()->route('admin.tintuc')
            ->with('success', 'Tin tức đã được thêm thành công.');
    }

    public function edit($id)
    {
        $tintuc = TinTuc::findOrFail($id);
        return view('admin.tintuc_sukien.edit', compact('tintuc'));
    }

    public function update(Request $request, $id)
    {
        $tintuc = TinTuc::findOrFail($id);
        
        $request->validate([
            'tieu_de' => 'required|max:255',
            'noi_dung' => 'required',
            'ngay_dang' => 'required|date',
        ]);

        $tintuc->update([
            'tieu_de' => $request->tieu_de,
            'noi_dung' => $request->noi_dung,
            'ngay_dang' => $request->ngay_dang,
        ]);

        return redirect()->route('admin.tintuc')
            ->with('success', 'Tin tức đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $tintuc = TinTuc::findOrFail($id);
        $tintuc->delete();

        return redirect()->route('admin.tintuc')
            ->with('success', 'Tin tức đã được xóa thành công.');
    }
}
