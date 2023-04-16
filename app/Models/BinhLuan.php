<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;
    protected $table = 'binh_luan';

    protected $primaryKey = 'id';

    protected $fillable = [
        'noi_dung',
        'trang_thai',
        'id_user',
        'id_san_pham',
        'reply_bl'
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'id_san_pham');
    }
}
