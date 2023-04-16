<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Coupon;

class CouponController extends Controller
{
    protected $couponModel ;
    public function __construct(Coupon $coupon)
    {
        $this->couponModel = $coupon;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = $this->couponModel
        ->orderBy('id', 'desc')
        ->paginate(5);
        return view('masterLayout.admin.coupon', ['coupons'=>$coupons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterLayout.admin.showAddCoupon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = new Coupon();
        $coupon->coupon = $request -> coupon;
        $coupon->ngay_bat_dau = $request -> ngayBD;
        $coupon->ngay_ket_thuc = $request -> ngayKT;
        if ($request->percent) {
            $coupon->loai_coupon = $request -> percent;
        } else {
            $coupon->loai_coupon = $request -> coDinh;
        }
        $coupon->mo_ta = $request -> moTa;
        $coupon->save();
        return redirect('admin/coupons');
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
        $editCoupon = $this->couponModel->find($id);
        return view('masterLayout.admin.showEditCoupon', ['editCoupon'=>$editCoupon]);
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
        $upCoupon = $this->couponModel->find($id);
        $upCoupon->coupon = $request -> coupon;
        $upCoupon->ngay_bat_dau = $request -> ngayBD;
        $upCoupon->ngay_ket_thuc = $request -> ngayKT;
        if ($request->percent) {
            $upCoupon->loai_coupon = $request -> percent;
        } else {
            $upCoupon->loai_coupon = $request -> coDinh;
        }
        $upCoupon->mo_ta = $request -> moTa;
        $upCoupon->save();
        return redirect('admin/coupons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleCoupon = $this->couponModel->find($id);
        $deleCoupon->delete();
        return back()->with('success', 'Đã xóa mã giảm thành công!');
    }
}
