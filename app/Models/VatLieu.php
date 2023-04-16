<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VatLieu extends Model
{
    use HasFactory;
    protected $table = "vat_lieu";
    protected $primaryKey = "id";
    protected $fillable = [
        'ten_vl',
    ];
    public function sanPhams()
    {
        return $this->hasMany(SanPham::class, 'id_vl', 'id');
    }
}
