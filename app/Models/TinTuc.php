<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    use HasFactory;
    protected $table = "tin_tuc";
    protected $primaryKey = "id";
    protected $fillable = [
        'id_dm_tt',
        'tieu_de',
        'tom_tat',
        'noi_dung',
        'views',
        'anh'
    ];
    public function blogCate()
    {
        return $this->hasOne(DmucBlog::class, 'id', 'id_dm_tt');
    }
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('tieu_de', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
