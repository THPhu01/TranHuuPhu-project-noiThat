<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\BinhLuan;

class BinhLuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $binhluan;
    public function __construct(BinhLuan $binhluan)
    {
        $this->binhluan = $binhluan;
    }
    public function index()
    {
        $binhluan = $this->binhluan->with('sanpham')
        ->where('reply_bl', '=', 0)
        ->leftJoin('users', 'binh_luan.id_user', '=', 'users.id')
        ->select('binh_luan.*', 'users.name')
        ->orderBy('trang_thai', 'desc')
        ->paginate(5);
        $rep_binhluan = $this->binhluan->with('sanpham')->where('reply_bl', '>', 0)
        ->orderBy('trang_thai', 'desc')->get();
        return view('masterLayout.admin.binhluan', ['binhluan'=>$binhluan, 'rep_binhluan'=>$rep_binhluan])
        ->with('i', (request()->input('page', 1) - 1) * 5);
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
    public function replyComment(Request $request)
    {
        $data = $request->all();
        $comment = new BinhLuan();
        $comment->noi_dung = $data['comment'];
        $comment->id_san_pham = $data['comment_sanpham_id'];
        $comment->reply_bl = $data['comment_id'];
        $comment->trang_thai = 0;
        $comment->id_user = Auth::user()->id;
        $comment->save();
    }
    public function allowComment(Request $request)
    {
        $comment = BinhLuan::find($request->input('comment_id'));
        $param = [
            'trang_thai' => $request->input('comment_status')
        ];
        $comment->update($param);
        // dd($comment);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BinhLuan::destroy($id);
        return redirect()->back();
    }
}
