<?php

namespace App\Http\Controllers;

use App\Models\DangKyTuyenSinh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class LienHeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        // Validate dữ liệu
        $validated = $request->validate([
            'notes' => 'required',
        ]);

        // Lấy thông tin user đã đăng nhập
        $user = Auth::user();
        
        // Log thông tin user để debug
        Log::info('User Login Info', [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ]);
        
        // Enable query logging
        DB::enableQueryLog();
        
        // Tìm đăng ký tuyển sinh của user này
        $dangKyTuyenSinh = DangKyTuyenSinh::where('phuhuynh_id', $user->id)
            ->orWhere('email', $user->email)
            ->first();
        
        // Log the query
        Log::info('SQL Query', [
            'user_id' => $user->id,
            'user_email' => $user->email,
            'queries' => DB::getQueryLog(),
            'found_record' => $dangKyTuyenSinh ? true : false
        ]);

        if (!$dangKyTuyenSinh) {
            return redirect()->back()
                ->with('error', 'Không tìm thấy thông tin đăng ký tuyển sinh của bạn! (ID: ' . $user->id . ', Email: ' . $user->email . ')')
                ->withInput();
        }

        // Cập nhật trường notes
        $dangKyTuyenSinh->notes = $request->notes;
        $dangKyTuyenSinh->save();

        // Redirect với thông báo thành công
        return redirect()->back()->with('success', 'Gửi ý kiến thành công!');
    }
}
