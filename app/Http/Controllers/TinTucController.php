<?php 
    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\TinTuc;
    use Illuminate\Http\Request;

    class TinTucController extends Controller {
        // Hien thi tất cả tin tuc
        public function index() {
            $tintuc = TinTuc::all()->sortByDesc('created_at','asc');
            return view('admin.tintuc.index', compact('tintuc'));
        }
    }
?>