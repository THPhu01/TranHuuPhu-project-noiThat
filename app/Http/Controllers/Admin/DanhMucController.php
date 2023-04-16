<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhMuc;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $danhMucModel ;
    public function __construct(DanhMuc $danhMuc)
    {
        $this->danhMucModel = $danhMuc;
    }

    public function index()
    {
        $danhmucs = $this->danhMucModel->all();
        return view('masterLayout.admin.listCate', ['listCate'=>$danhmucs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterLayout.admin.addCate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Cate = new DanhMuc();
        $Cate->ten_dm = $request->ten_dm;
        $Cate->save();
        return redirect()->route('danhmucs.index');
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
        $editCate = DanhMuc::find($id);
        if ($editCate == null) {
            return redirect('/thông báo');
        }
        return view('masterLayout.admin.editCate', ['editCate'=>$editCate]);
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
        $upCate = DanhMuc::find($id);
        $upCate->ten_dm = $request->ten_dm;
        if ($upCate == null) {
            return redirect('/thông báo');
        }
        $upCate->save();
        return redirect()->route('danhmucs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dlCate = DanhMuc::find($id);
        $dlCate->delete();
        return redirect()->route('danhmucs.index');
    }
}
