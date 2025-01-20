<?php

namespace App\Http\Controllers;

use App\Models\TinTuc;
use App\Models\ThongBaoSuKien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TinTucSuKienController extends Controller
{
    public function index()
    {
        try {
            // Get tin tức
            $tintuc = TinTuc::with('user')
                            ->orderBy('ngay_dang', 'desc')
                            ->take(6)
                            ->get();

            // Get sự kiện
            $sukien = ThongBaoSuKien::where('trang_thai', '!=', 'Đã kết thúc')
                                    ->orderBy('ngay_dien_ra', 'desc')
                                    ->take(6)
                                    ->get();

            // Return view with variables
            return view('clients.tintuc_sukien', compact('tintuc', 'sukien'));

        } catch (\Exception $e) {
            Log::error('Error in TinTucSuKienController: ' . $e->getMessage());
            
            // Return view with empty collections if there's an error
            return view('clients.tintuc_sukien', [
                'tintuc' => collect([]),
                'sukien' => collect([])
            ]);
        }
    }

    public function tinTucDetail($id)
    {
        $tintuc = TinTuc::findOrFail($id);
        return view('clients.tintuc_detail', compact('tintuc'));
    }

    public function suKienDetail($id)
    {
        $sukien = ThongBaoSuKien::findOrFail($id);
        return view('clients.sukien_detail', compact('sukien'));
    }
}
