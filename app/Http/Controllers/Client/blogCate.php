<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DmucBlog;
use App\Models\TinTuc;
use App\Models\Banner;

class BlogCate extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhMucTin = DmucBlog::all();
        $banner = Banner::all();
        $tintuc = TinTuc::orderBy('created_at', 'desc')->search()->paginate(12);
        $tintucHot = TinTuc::orderBy('views', 'desc')->limit(6)->get();
        return view('masterLayout.client.blogCate', compact('danhMucTin', 'tintuc', 'tintucHot', 'banner'));
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
        $danhMucTin = DmucBlog::all();
        $banner = Banner::all();
        $tintuc = TinTuc::where('id_dm_tt', $id)->orderBy('created_at', 'desc')->search()->paginate(12);
        $loai_dm = DmucBlog::where('id', $id)->first();
        $tintucHot = TinTuc::orderBy('views', 'desc')->limit(6)->get();
        return view('masterLayout.client.blogCate', compact('danhMucTin', 'tintuc', 'tintucHot', 'loai_dm','banner'));
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
