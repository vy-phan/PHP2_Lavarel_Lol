<?php

namespace App\Http\Controllers;

use App\Models\DangKyTuyenSinh;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TuyenSinhController extends Controller
{
    public function index()
    {
        return view('clients.tuyensinh');
    }

    // Xử lý lưu trữ thông tin đăng ký tuyển sinh vào cơ sở dữ liệu
    public function store(Request $request)
    {
        // Xác thực dữ liệu nhập từ form
        $request->validate([
            'phuhuynh_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            // Điều kiện email là duy nhất không được trùng với tên học sinh và status khác rejecte
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('dangkytuyensinh')->where(function ($query) use ($request) {
                    return $query->where('child_name', $request->child_name)
                        ->where('status', '!=', 'rejected');
                })
            ],
            'address' => 'required|string|max:255',
            // Điều kiện tên học sinh là duy nhất không được trùng với email và status khác rejecte
            'child_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('dangkytuyensinh')->where(function ($query) use ($request) {
                    return $query->where('email', $request->email)
                        ->where('status', '!=', 'rejected');
                })
            ],
            'child_birth_date' => 'required|date',
            'child_gender' => 'required|string|in:male,female',
            'class_registered' => 'required|string|in:nha_tre,mau_giao_nho,mau_giao_lon,mau_giao_choi',
            'notes' => 'nullable|string'
        ], [
            'phuhuynh_name.required' => 'Vui lòng nhập họ tên phụ huynh',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'email.required' => 'Vui lòng nhập email phụ huynh',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email này đã được sử dụng để đăng ký cho học sinh này',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'child_name.required' => 'Vui lòng nhập họ tên bé',
            'child_name.unique' => 'Học sinh này đã được đăng ký với email này',
            'child_birth_date.required' => 'Vui lòng chọn ngày sinh của bé',
            'child_gender.required' => 'Vui lòng chọn giới tính',
            'child_gender.in' => 'Giới tính không hợp lệ',
            'class_registered.required' => 'Vui lòng chọn lớp đăng ký',
            'class_registered.in' => 'Lớp đăng ký không hợp lệ'
        ]);

        try {
            DangKyTuyenSinh::create($request->all());
            return redirect()->route('tuyensinh')
                ->with('success', 'Đăng ký tuyển sinh thành công! Chúng tôi sẽ liên hệ với bạn sớm nhất.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra khi đăng ký. Vui lòng thử lại sau.');
        }
    }
}
