<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoaiTTValidate;
use Illuminate\Http\Request;
use App\Models\DmucBlog;

class DmBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $dmucBlog;
    public function __construct(DmucBlog $dmucBlog)
    {
        $this->dmucBlog = $dmucBlog;
    }
    public function index()
    {
        $dmblog = $this->dmucBlog->all();
        return view('masterLayout.admin.listCateBlog', ['dmblog'=>$dmblog]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterLayout.admin.addCateBlog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoaiTTValidate $request)
    {
        $validated = $request->validated();
        $dmtt = new DmucBlog();
        $dmtt->ten = $request->ten;
        $dmtt->save();
        // return redirect()->route('danhmucblogs.index');
        return back()->with('Thành công', 'Thêm danh mục thành công');
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
        $editdmbg = $this->dmucBlog->find($id);
        if ($editdmbg == null) {
            return redirect('/thông báo');
        };
        return view('masterLayout.admin.editCateBlog', ['editdmbg' => $editdmbg]);
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
        $upblog = DmucBlog::find($id);
        $upblog->ten = $request->ten;
        if ($upblog ==null) {
            return redirect('/thông báo');
        };
        $upblog->save();
        return redirect()->route('danhmucblogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dlblog = DmucBlog::find($id);
        $dlblog ->delete();
        return redirect()->route('danhmucblogs.index');
    }
}
