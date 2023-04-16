<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\LoaiDanhMuc;
use App\Models\SanPham;
use App\Models\Banner;
use App\Models\Rating;

class ShopDetail extends Controller
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
        $chiTiet = SanPham::where('id', $id)->first();
        $banner = Banner::all();
        $loai_dm = LoaiDanhMuc::where('id', '=', $chiTiet->id_loai_dm)->first();

        $rating = Rating::where('id_sp', '=', $chiTiet->id)->avg('rating');
        $rating = round($rating);

        //Sản phẩm tương tự
        $san_pham_tt = SanPham::select()->where('id_loai_dm', $chiTiet->loaiDm->id)->inRandomOrder()->get();
        return view('masterLayout.client.shop_details', compact('chiTiet', 'san_pham_tt', 'loai_dm', 'rating', 'banner'));
    }

    public function insertRating(Request $request)
    {
        $data = $request->all();
        $rating = new Rating();
        $rating->id_sp = $data['id_sanpham'];
        $rating->rating = $data['index'];
        $rating->save();
        echo 'done';
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
