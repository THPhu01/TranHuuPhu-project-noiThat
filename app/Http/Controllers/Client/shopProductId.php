<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\LoaiDanhMuc;
use App\Models\SanPham;
use App\Models\VatLieu;
use App\Models\Banner;

class shopProductId extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $danhMuc = DanhMuc::all();
        $vat_lieu = VatLieu::all();
        $banner = Banner::all();
        $loai_dm = LoaiDanhMuc::where('id', $id)->first();

        $min_price = SanPham::min('gia_goc');
        $max_price = (SanPham::max('gia_goc'));

        $sanPham = SanPham::where('tinh_trang', 1)->where('id_loai_dm', $id)->sort()->orderBy('created_at', 'desc')->inRandomOrder()->search()->paginate(12);
        return view('masterLayout.client.shopProductId', compact('sanPham', 'danhMuc', 'loai_dm', 'vat_lieu', 'min_price', 'max_price','banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
