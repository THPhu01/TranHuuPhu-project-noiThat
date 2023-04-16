<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use App\Models\DanhMucTin;
use App\Models\DmucBlog;

class DanhMucTinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $danhMucTin = [
            'Thông báo',
            'Tư vấn vật liệu',
            'Phong thủy nội thất',
            'Phong cách thiết kế',
        ];
        foreach ($danhMucTin as $item) {
            DmucBlog::create([
                'ten' => $item,
            ]);
        };
    }
}
