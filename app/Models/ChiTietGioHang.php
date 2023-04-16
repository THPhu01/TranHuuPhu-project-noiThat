<?php

namespace App\Models;

use Http\Message\Authentication\Bearer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChiTietGioHang extends Model
{
    use HasFactory;
    protected $table = "chi_tiet_gio_hang";

    public function giohang()
    {
        return $this->belongsTo(GioHang::class, 'gio_hang_id');
    }

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'san_pham_id');
    }
}
