<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_don_hang';

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'id_sp');
    }
}
