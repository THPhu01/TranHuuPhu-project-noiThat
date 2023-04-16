<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BinhLuan;
use App\Models\DonHang;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * @var \Illuminate\Http\RequestP
     */
    
    public function index()
    {
        $totalBinhLuan = BinhLuan::where('created_at', '>', new Carbon('first day of this month'))->count();
        $totalKhachHangDangKi = User::where('created_at', '>', new Carbon('first day of this month'))->where('is_admin', false)->count();
        $donHangChuaXuLy = DonHang::where('trang_thai', 0)->count();
        $donHangGiaoThanhCong = DonHang::where('trang_thai', 3)->where('updated_at', '>', new Carbon('first day of this month'))->count();
        return view('masterLayout.admin.adminHome', compact('totalBinhLuan', 'donHangChuaXuLy', 'donHangGiaoThanhCong', 'totalKhachHangDangKi'));
    }

    public function loginPage()
    {
        return view('masterLayout.admin.loginAdmin');
    }

    public function login(Request $request)
    {


        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials['is_admin'] = 1;
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

 
        return back()->withErrors([
            'email' => 'Không tồn tại email',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        return redirect('admin/login-page');
    }
}
