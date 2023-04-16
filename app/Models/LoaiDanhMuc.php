<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiDanhMuc extends Model
{
    use HasFactory;
    protected $table = 'loai_danh_muc';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tenLoaidm',
        'id_dm'
    ];

    public function product()
    {
        return $this->hasMany(SanPham::class, 'id_loai_dm ', 'id');
    }
}
