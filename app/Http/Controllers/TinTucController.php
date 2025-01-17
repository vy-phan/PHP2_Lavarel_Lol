<?php 
    namespace App\Http\Controllers;

    use App\Models\TinTuc;
    use App\Models\ThongBaoSuKien;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    class TinTucController extends Controller 
    {
        // Hiển thị trang tin tức cho client
        public function clientIndex() 
        {
            try {
                $tintuc = TinTuc::orderBy('ngay_dang', 'desc')
                                ->paginate(6); // Hiển thị 6 tin tức mỗi trang
            
                $sukien = ThongBaoSuKien::orderBy('ngay_dien_ra', 'desc')
                                        ->paginate(6); // Hiển thị 6 sự kiện mỗi trang
            
                return view('clients.tintuc_sukien', [
                    'tintuc' => $tintuc,
                    'sukien' => $sukien
                ]);
            } catch (\Exception $e) {
                return view('clients.tintuc_sukien', [
                    'tintuc' => collect([]),
                    'sukien' => collect([])
                ])->with('error', 'Có lỗi xảy ra khi tải dữ liệu.');
            }
        }

        // Hiển thị chi tiết tin tức
        public function show($id)
        {
            try {
                $tintuc = TinTuc::findOrFail($id);
                return view('clients.tintuc_detail', compact('tintuc'));
            } catch (\Exception $e) {
                return back()->with('error', 'Không tìm thấy tin tức.');
            }
        }
    }
?>