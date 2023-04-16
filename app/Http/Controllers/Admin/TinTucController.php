<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TinTucValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DmucBlog;
use App\Models\TinTuc;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class TinTucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $tinTucBlog;
    public function __construct(TinTuc $tinTucBlog)
    {
        $this->tinTucBlog = $tinTucBlog;
    }
    public function index()
    {
        $listblog = $this->tinTucBlog->leftJoin('danhmuc_tintuc', 'tin_tuc.id_dm_tt', '=', 'danhmuc_tintuc.id')->select('tin_tuc.*', 'danhmuc_tintuc.ten')
        ->orderBy('id', 'desc')
        ->paginate(5);
        return view('masterLayout.admin.listBlog', ['listblog' => $listblog])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dmtt = DmucBlog::all();
        return view('masterLayout.admin.addBlog', ['dmtt' => $dmtt]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TinTucValidate $request)
    {
        $validated = $request->validated();
        $tt = new TinTuc();
        $tt->id_dm_tt = $request->id_dm_tt;
        $tt->tieu_de = $request->tieu_de;
        $tt->tom_tat = $request->tom_tat;
        $tt->noi_dung = $request->noi_dung;
        if ($request->file('file_upload')) {
            $url = Cloudinary::upload($request->file('file_upload')->getRealPath())->getSecurePath();
            $tt->anh =  $url;
        };
        $tt->views = $request->views;
        $tt->save();
        return redirect()->route('tintucs.index');
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
        $dmtt = DmucBlog::all();
        $editblog = TinTuc::find($id);
        if ($editblog == null) {
            return redirect('/thông báo');
        }
        return view('masterLayout.admin.editBlog', ['editblog' => $editblog, 'dmtt' => $dmtt]);
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
        $uptt = TinTuc::find($id);
        if ($uptt == null) {
            return redirect('/thông báo');
        };
        $uptt->id_dm_tt = $request->id_dm_tt;
        $uptt->tieu_de = $request->tieu_de;
        $uptt->tom_tat = $request->tom_tat;
        $uptt->noi_dung = $request->noi_dung;
        if ($request->file('file_upload')) {
            $url = Cloudinary::upload($request->file('file_upload')->getRealPath())->getSecurePath();
            $uptt->anh =  $url;
        };
        $uptt->views = $request->views;
        $uptt->save();
        return redirect()->route('tintucs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deltt = TinTuc::find($id);
        $deltt->delete();
        return redirect()->route('tintucs.index');
    }
}
