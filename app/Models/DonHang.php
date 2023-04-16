<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $table = 'don_hang';
    

    public function getPaymentMethodAttribute($value)
    {
        $trangThai =[
            0 => 'Thanh Toán Chuyển Khoản',
            1 => 'Thanh toán khi nhận hàng',
        ];
        return $trangThai[$value] ?? 'Thanh toán khi nhận hàng';
    }

    public function chiTietDonHangs()
    {
        return $this->hasMany(ChiTietDonHang::class, 'id_dh');
    }
    public function getTrangThai(){

        $trangThai =[
            0 => ['Chưa xử lí','secondary'],
            1 => ['Chấp Nhận','primary'],
            2 => ['Đang Giao','info'],
            3 => ['Giao thành công','success'],
            4 => ['Tạch','danger']
        ];
        return $trangThai[$this->trang_thai];
    }
    
}
