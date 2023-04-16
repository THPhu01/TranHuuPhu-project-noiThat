<?php

namespace App\Http\Controllers\Client;

use App\Models\ChiTietDonHang;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\GioHang;

use App\Models\ChiTietGioHang;

use App\Models\DonHang;

use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{

    protected $gioHangModel;
    protected $chiTietGioHangModel;


    public function __construct(GioHang $gioHang, ChiTietGioHang $chiTietGioHang)
    {
        $this->gioHangModel = $gioHang;

        $this->chiTietGioHangModel = $chiTietGioHang;
    }


    public function index(){
        if(Auth::check()){
            $gioHang = $this->gioHangModel->where('user_id',Auth::user()->id)->first();
        }else {
            $gioHang = $this->gioHangModel->where('session_id',request()->ip())->first();
        }
        $chiTietCarts =  $gioHang ? $gioHang->chiTietGioHangs()->with('sanPham')->get() : [];
        return view('masterLayout.client.shop_checkout', ['carts' =>$chiTietCarts]);
    }
    public function create(Request $request)
    {
        $donHang = new DonHang();
        $donHang->id_user = Auth::check() ? Auth::user()->id : null;
        if(Auth::check()){
            $gioHang = $this->gioHangModel->where('user_id', Auth::user()->id)->first();
        }else {
            $gioHang = $this->gioHangModel->where('session_id',request()->ip())->first();
        }
        $donHang->ho_va_ten = $request->billing_first_name.' '.$request->billing_last_name;

        $donHang->dia_chi   = $request->billing_address_1;

        $donHang->email   = $request->billing_email;

        $donHang->phone   = $request->billing_phone;

        $donHang->payment_method   = $request->payment_method;

        $donHang->save();

        $currentCarts =  $gioHang->chiTietGioHangs()->get();
        $total = 0 ;
        foreach ($currentCarts as $item) {
            $chiTietDonHang = new ChiTietDonHang();
            
            if($item->sanPham->gia_khuyen_mai != 0){
                $chiTietDonHang->gia_sp = $item->sanPham->gia_khuyen_mai;
                $chiTietDonHang->tong = $item->so_luong * $item->sanPham->gia_khuyen_mai;
                $total += $item->sanPham->gia_goc * $item->so_luong;
            }else{
                $chiTietDonHang->gia_sp = $item->sanPham->gia_goc;
                $chiTietDonHang->tong = $item->so_luong * $item->sanPham->gia_goc;
                $total += $item->sanPham->gia_khuyen_mai * $item->so_luong;
            }

            $chiTietDonHang->id_dh = $donHang->id;

            $chiTietDonHang->id_sp = $item->san_pham_id;
            
            $chiTietDonHang->so_luong = $item->so_luong;
            $chiTietDonHang->save();
        }
        $donHang->tong =  $total;

        $donHang->save();
        $gioHang->delete();
        return redirect()->back() ;
    }
}
