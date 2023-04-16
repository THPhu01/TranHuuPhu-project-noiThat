<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\LoaiDanhMuc;
use App\Models\SanPham;
use App\Models\BinhLuan;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
use App\Models\VatLieu;

class ShopProduct extends Controller
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::all();
        $min_price = SanPham::min('gia_goc');
        $max_price = (SanPham::max('gia_goc'));
        $danhMuc = DanhMuc::all();
        $vat_lieu = VatLieu::all();
        $sanPham = SanPham::where('tinh_trang', 1)->sort()->inRandomOrder()->search()->paginate(12);
        return view('masterLayout.client.shopProduct', compact('sanPham', 'danhMuc', 'vat_lieu', 'min_price', 'max_price','banner'));
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
        $vat_lieu_id = VatLieu::where('id', $id)->first();

        $min_price = SanPham::min('gia_goc');
        $max_price = (SanPham::max('gia_goc'));

        $loai_dm = LoaiDanhMuc::where('id', $id)->first();
        $sanPham = SanPham::where('tinh_trang', 1)->where('id_vl', $id)->sort()->inRandomOrder()->search()->paginate(12);
        return view('masterLayout.client.shopProduct', compact('sanPham', 'danhMuc', 'loai_dm', 'vat_lieu', 'vat_lieu_id', 'min_price', 'max_price','banner'));
    }

    public function sendComment()
    {
        if (empty(Auth::check())) {
            return response()->json([
                'status' => 'error',
                'message' => 'Bạn chưa đăng nhập',
                'data' => Auth::user()
            ]);
        }
        $sanpham_id = $this->request->get('sanpham_id');
        $id_user = Auth::user()->id;
        $noi_dung = $this->request->get('comment_content');
        $comment = new BinhLuan();
        $param  =    [
            'id_san_pham' => $sanpham_id,
            'id_user' => $id_user,
            'noi_dung' => $noi_dung,
            'trang_thai' => 1,
            'reply_bl' => 0
        ];
        $comment->create($param);

        $validator = validator::make(
            $this->request->all(),
            [
                'noi_dung' => 'required',
            ],
            [
                'noi_dung.required' => 'Nhập nội dung'
            ]
        );
        if($validator->fails()) {
            return response()->json(
                $validator->errors()->messages()
            );
        }
        
        if (!empty($comment)) {
            return response()->json([
                'status' => 'success',
                'message' => 'Bình luận thành công',
                'data' => $comment
            ]);
        }
    }
    public function loadComment()
    {
        $sanpham_id = $this->request->get('sanpham_id');
        $comment = BinhLuan::where('id_san_pham', $sanpham_id)
        ->leftJoin('users', 'binh_luan.id_user', '=', 'users.id')
        ->select('binh_luan.*', 'users.name')
        ->where('reply_bl', '=', 0)
        ->where('trang_thai', 0)
        ->get();
        $rep_binhluan = BinhLuan::where('reply_bl', '>', 0)
        ->leftJoin('users', 'binh_luan.id_user', '=', 'users.id')
        ->select('binh_luan.*', 'users.name')
        ->get();
        foreach ($comment as $comm) {
            echo '
                <div class="comment-container">
                    <img src="'.url('ruper/media/product/9-2.jpg').'" class="avatar" height="60" width="60" alt="">
                    <div class="comment-text">
                        <div class="rating small">
                            <div class="star star-5"></div>
                        </div>
                        <div class="review-author">'.$comm->name.'</div>
                        <div class="review-time">'.$comm->created_at.'</div>
                        <div class="review-description"><p style="color:black">'.$comm->noi_dung.'</p></div>
                    </div>
                </div>
                ';
            foreach ($rep_binhluan as $bl_reply) {
                if ($bl_reply->reply_bl==$comm->id) {
                    echo '  <ol class="comment-list">
                                <li class="review">
                                    <div class="content-comment-container">
                                        <div class="comment-container">
                                            <img src="'.url('ruper/media/product/9-2.jpg').'" class="avatar" height="60" width="60" alt="">
                                            <div class="comment-text">
                                                <div class="review-author">'.$bl_reply->name.'</div>
                                                <div class="review-time">'.$bl_reply->created_at.'</div>
                                                <div class="description">
                                                    <p>'.$bl_reply->noi_dung.'</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        ';
                }
            }
        }
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
