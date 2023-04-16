<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DmucBlog extends Model
{
    use HasFactory;
    protected $table = "danhmuc_tintuc";
    protected $primaryKey = "id";
    protected $fillable = [
        'ten',
    ];
    public function blog()
    {
        return $this->hasMany(TinTuc::class, 'id_dm_tt', 'id');
    }
}
