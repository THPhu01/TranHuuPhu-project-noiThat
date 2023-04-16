<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\VatLieu;

class VatLieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $vatLieu;
    public function __construct(VatLieu $vatLieu)
    {
        $this->vatLieu = $vatLieu;
    }
    public function index()
    {
        $listVatLieu = $this->vatLieu->orderBy('id', 'desc')->paginate(5);
        return view('masterLayout.admin.listVatLieu', ['listVatLieu'=>$listVatLieu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterLayout.admin.showAddVatLieu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vatLieu = new VatLieu();
        $vatLieu->ten_vl = $request->ten_vl;
        $vatLieu->save();
        return redirect('admin/vatlieus');
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
        $vatLieu = $this->vatLieu->find($id);
        return view('masterLayout.admin.showEditVatLieu', ['vatLieu'=>$vatLieu]);
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
        $vatLieuEdit = $this->vatLieu->find($id);
        $vatLieuEdit->ten_vl = $request->ten_vl;
        $vatLieuEdit->save();
        return redirect('admin/vatlieus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $xoaVL = $this->vatLieu->find($id);
        $xoaVL->delete();
        return back()->with('success', 'Đã xóa vật liệu thành công!');
    }
}
