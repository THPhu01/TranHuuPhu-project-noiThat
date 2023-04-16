<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;
    protected $table = 'danh_muc';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ten_dm',
    ];
    public function loaiDanhMucs()
    {
        return $this->hasMany(LoaiDanhMuc::class, 'id_dm', 'id');
    }
}
