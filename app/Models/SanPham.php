<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'san_pham';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_loai_dm',
        'id_vl',
        'tenSP',
        'anh',
        'thumbnail',
        'gia_goc',
        'so_luong',
        'gia_khuyen_mai',
        'phantram',
        'tinh_trang',
        'mo_ta',
        'kich_thuoc',
        'rate',
        'hot',
        'view',
    ];
    public function getThumbnailAttribute($value)
    {
        return json_decode($value) ?? [];
    }
    public function loaiDm()
    {
        return $this->hasOne(LoaiDanhMuc::class, 'id', 'id_loai_dm');
    }
    public function vatLieu()
    {
        return $this->hasOne(VatLieu::class, 'id', 'id_vl');
    }
    public function scopeSearch($query)
    {
        if (request()->search !== null) {
            $search = request()->search;
            $query = $query->where('tenSP', 'like', '%' . $search . '%');
        }
        return $query;
    }
    public function binhluan()
    {
        return $this->hasMany(BinhLuan::class);
    }
    public function chiTietGioHangs()
    {
        return $this->hasMany(ChiTietGioHang::class, 'san_pham_id');
    }
    public function scopeSort($query)
    {
        if (request()->loc_sp !== null) {
            $loc_sp = request()->loc_sp;
            if ($loc_sp == 'tang_dan') {
                $loc_sp = $query->orderBy('gia_goc', 'asc');
            } elseif ($loc_sp == 'giam_dan') {
                $loc_sp = $query->orderBy('gia_goc', 'desc');
            } elseif ($loc_sp == 'ten_az') {
                $loc_sp = $query->orderBy('tenSP', 'asc');
            } elseif ($loc_sp == 'ten_za') {
                $loc_sp = $query->orderBy('tenSP', 'desc');
            }
        } elseif (request()->price_min !== null && request()->price_max !== null) {
            $price_min = request()->price_min;
            $price_max = request()->price_max;
            if ($price_min >= 0 &&  $price_max > 0) {
                $loc_sp = $query->whereBetween('gia_goc', [$price_min, $price_max])->orderBy('gia_goc', 'asc');
            } else {
                $loc_sp = $query->orderBy('gia_goc', 'asc');
            }
        } else {
            $loc_sp = $query->orderBy('created_at', 'desc');
        }
        return $loc_sp;
    }

    public function wishlist(): HasMany
    {
        return $this->hasMany(wishlist::class);
    }
}
