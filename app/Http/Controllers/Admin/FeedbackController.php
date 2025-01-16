<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DangKyTuyenSinh;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Hiển thị danh sách phản hồi
     */
    public function index()
    {
        // Lấy danh sách phản hồi từ bảng dangkytuyensinh
        // Chỉ lấy những bản ghi có notes và sắp xếp theo thời gian mới nhất
        $feedbacks = DangKyTuyenSinh::whereNotNull('notes')
            ->orderBy('updated_at', 'desc')
            ->get();

        // Trả về view kèm theo dữ liệu feedbacks 
        return view('admin.feedback.phanhoi', compact('feedbacks'));
    }

    /**
     * Hiển thị chi tiết một phản hồi
     */
    public function show($id)
    {
        $feedback = DangKyTuyenSinh::findOrFail($id);
        return view('admin.feedback.show', compact('feedback'));
    }

    /**
     * Xóa phản hồi
     */
    public function destroy($id)
    {
        $feedback = DangKyTuyenSinh::findOrFail($id);
        // Chỉ xóa nội dung ghi chú, không xóa bản ghi
        $feedback->update(['notes' => null]);
        
        return redirect()->route('admin.phanhoi')
            ->with('success', 'Đã xóa phản hồi thành công');
    }
}