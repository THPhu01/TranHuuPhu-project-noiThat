<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiDanhMuc;
use App\Models\DanhMuc;
use Illuminate\Support\Facades\DB;

class LoaiDanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $loaidanhMucModel ;
    public function __construct(LoaiDanhMuc $loaidanhMuc)
    {
        $this->loaidanhMucModel = $loaidanhMuc;
    }

    public function index()
    {
        $loaidanhmucs = $this->loaidanhMucModel->all()->toQuery()->paginate(10);
        return view('masterLayout.admin.typeCate', ['typeCate'=>$loaidanhmucs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $danhmuc = DanhMuc::all();
        return view('masterLayout.admin.addTypeCate', ['danhmuc'=>$danhmuc]);
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
        $loaidanhmuc = new LoaiDanhMuc;
        $loaidanhmuc-> tenLoaidm = $request-> tenloai;
        $loaidanhmuc-> id_dm = $request-> danhmuc;
        $loaidanhmuc->save();
        return redirect()->back();
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
        $danhmuc = DanhMuc::all();
        $loaidanhmuc = LoaiDanhMuc::find($id);
        return view('masterLayout.admin.editTypeCate', ['danhmuc'=>$danhmuc, 'loaidanhmuc' =>$loaidanhmuc]);
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
        $loaidanhmuc = LoaiDanhMuc::find($id);
        $loaidanhmuc->update([
            'tenLoaidm' => $request-> tenloai,
            'id_dm' => $request-> danhmuc
        ]);
        return redirect()->route('loaidanhmucs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LoaiDanhMuc::destroy($id);
        return back()->with('success', 'Đã xóa loại danh mục thành công !');
    }
}
