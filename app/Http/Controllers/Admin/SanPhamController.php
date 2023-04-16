<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\VatLieu;
use App\Models\LoaiDanhMuc;
use App\Http\Requests\SanPhamValidate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class SanPhamController extends Controller
{

   
    protected $sanphamModel ;
    public function __construct(SanPham $sanPham)
    {
        $this->sanphamModel = $sanPham;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sanphams = $this->sanphamModel
        ->join('loai_danh_muc', 'san_pham.id_loai_dm', '=', 'loai_danh_muc.id')
        ->join('vat_lieu', 'san_pham.id_vl', '=', 'vat_lieu.id')
        ->orderBy('id', 'desc')
        ->paginate(10, ['san_pham.*','loai_danh_muc.tenLoaidm' , 'vat_lieu.ten_vl']);
        return view('masterLayout.admin.listProduct', ['sanphams'=>$sanphams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = LoaiDanhMuc::all();
        $vatLieu = VatLieu::all();
        return view('masterLayout.admin.showAddPro', ['cate'=>$cate , 'vatLieu'=>$vatLieu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SanPhamValidate $request)
    {
        $validated = $request->validated();
        $request->thumb = $request->thumb ?? [];

        $cate = LoaiDanhMuc::find($request->loai);

        $sanPham = new SanPham();
        $sanPham->id_loai_dm = $request -> loai;
        $sanPham->id_vl = $request -> vatLieu;
        $sanPham->tenSP = $request -> tenSP;
        if ($request->file('img')) {
            $url = Cloudinary::upload($request->file('img')->getRealPath())->getSecurePath();
            $sanPham->anh =  $url;
        };
        $thumbs = [];
        foreach ($request->thumb as $thumb) {
            $urlThumb = Cloudinary::upload($thumb->getRealPath())->getSecurePath();
            array_push($thumbs, $urlThumb);
        }
        $sanPham->thumbnail = json_encode($thumbs);
        $sanPham->so_luong = $request -> soLuong;
        $sanPham->gia_goc = $request -> giaGoc;
        $sanPham->gia_khuyen_mai = $request -> giaKM;
        $sanPham->tinh_trang = $request -> tinhTrang;
        $sanPham->mo_ta = $request -> moTa;
        $sanPham->save();
        return redirect('admin/sanphams');
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
        $showSanpham = $this->sanphamModel
        ->join('loai_danh_muc', 'san_pham.id_loai_dm', '=', 'loai_danh_muc.id')
        ->join('vat_lieu', 'san_pham.id_vl', '=', 'vat_lieu.id')
        ->select('san_pham.*', 'loai_danh_muc.tenLoaidm', 'vat_lieu.ten_vl')
        ->find($id);
        $cate = LoaiDanhMuc::all();
        $vatLieu = VatLieu::all();
        return view('masterLayout.admin.showEditPro', ['showSanpham'=>$showSanpham ,'cate'=>$cate, 'vatLieu'=>$vatLieu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SanPhamValidate $request, $id)
    {
        $validated = $request->validated();
        $cate = LoaiDanhMuc::find($request->loai);
        $request->thumb = $request->thumb ?? [];
        
        $upSanpham = $this->sanphamModel->find($id);
        $upSanpham->id_vl = $request -> vatLieu;
        $upSanpham->id_loai_dm = $request -> loai;
        $upSanpham->tenSP = $request -> tenSP;

       
        if ($request->file('img')) {
            $url = Cloudinary::upload($request->file('img')->getRealPath())->getSecurePath();
            $upSanpham->anh =  $url;
        };
        $thumbs = [];
        foreach ($request->thumb as $thumb) {
            $urlThumb = Cloudinary::upload($thumb->getRealPath())->getSecurePath();
            array_push($thumbs, $urlThumb);
        }
        if (!empty($thumbs)) {
            $upSanpham->thumbnail = json_encode($thumbs);
        }
        $upSanpham->gia_goc = $request -> giaGoc;
        $upSanpham->gia_khuyen_mai = $request -> giaKM;
        $upSanpham->so_luong = $request -> soLuong;
        $upSanpham->tinh_trang = $request -> tinhTrang;
        $upSanpham->mo_ta = $request -> moTa;
        $upSanpham->save();
        return redirect('admin/sanphams');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $xoaSanpham = $this->sanphamModel->find($id);
        $xoaSanpham->delete();
        return back()->with('success', 'Đã xóa sản phẩm thành công!');
    }
}
