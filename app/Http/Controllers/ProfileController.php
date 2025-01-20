<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('clients.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
        ]);

        try {
            $updateData = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            // Chỉ cập nhật password nếu được cung cấp
            if ($request->filled('password')) {
                $updateData['password'] = Hash::make($request->password);
            }

            $user->update($updateData);

            return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
        } catch (\Exception $e) {
            \Log::error('Profile update error: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Có lỗi xảy ra khi cập nhật thông tin!')
                ->withInput();
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Mật khẩu hiện tại không chính xác!');
        }

        try {
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            return redirect()->back()->with('success', 'Đổi mật khẩu thành công!');
        } catch (\Exception $e) {
            \Log::error('Password update error: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Có lỗi xảy ra khi đổi mật khẩu!')
                ->withInput();
        }
    }
} 