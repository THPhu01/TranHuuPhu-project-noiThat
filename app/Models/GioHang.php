<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;
    protected $table = "gio_hang";
    protected $fillable = [
        'session_id',
        'user_id',
        'quatity'
    ];
    public function chiTietGioHangs()
    {
        return $this->hasMany(ChiTietGioHang::class, 'gio_hang_id');
    }
}
