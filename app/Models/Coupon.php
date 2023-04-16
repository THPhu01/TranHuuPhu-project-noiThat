<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupon';

    protected $primaryKey = 'id';

    protected $fillable = [
        'coupon',
        'mo_ta',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'loai_coupon',
    ];
}
