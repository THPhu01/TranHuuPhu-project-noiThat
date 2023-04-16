<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ChiTietGioHang;
use Illuminate\Http\Request;
use App\Models\GioHang;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;

class GioHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $gioHangModel;
    protected $chiTietGioHangModel;


    public function __construct(GioHang $gioHang, ChiTietGioHang $chiTietGioHang)
    {
        $this->gioHangModel = $gioHang;
        $this->chiTietGioHangModel = $chiTietGioHang;
    }

    public function index()
    {
        $banner = Banner::all();
        if (Auth::check()) {
            $gioHang = $this->gioHangModel->where('user_id', Auth::user()->id)->first();
        } else {
            $gioHang = $this->gioHangModel->where('session_id', request()->ip())->first();
        }
        $chiTietCarts = $gioHang ? $gioHang->chiTietGioHangs()->with('sanPham')->get() : [];
        return view('masterLayout.client.gioHang', ['carts' => $chiTietCarts, 'banner' => $banner]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gioHang = Auth::check()
            ? $this->gioHangModel->where('user_id', Auth::id())->firstOrNew()
            : $this->gioHangModel->where('session_id', request()->ip())->firstOrNew();

        if (Auth::check()) {
            $gioHang->user_id = Auth::id();
        } else {
            $gioHang->session_id = request()->ip();
        }

        $gioHang->save();

        $chiTietGioHang = $gioHang->chiTietGioHangs()->where('san_pham_id', $request->id_sp)->firstOrNew();

        if ($chiTietGioHang->exists) {
            $chiTietGioHang->so_luong += 1;
        } else {
            $chiTietGioHang->gio_hang_id = $gioHang->id;
            $chiTietGioHang->san_pham_id = $request->id_sp;
        }

        $chiTietGioHang->save();


        return $chiTietGioHang;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        foreach ($request->chiTietDonHangs as $item) {
            $chiTietGioHang = $this->chiTietGioHangModel->find($item['chi_tiet_don_hang_id']);
            $chiTietGioHang->so_luong = $item['so_luong'];
            $chiTietGioHang->save();
        }
        return 'update successfully';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return  $this->chiTietGioHangModel->destroy($id);
    }
}
