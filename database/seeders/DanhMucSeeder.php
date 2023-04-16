<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DanhMuc;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $danhMuc = [
            'Sofa và Armchair',
            'Bàn',
            'Ghế',
            'Giường ngủ',
            'Tủ và kệ',
            'Bếp',
            'Hàng trang trí',
            'Ngoại thất'
        ];
        foreach ($danhMuc as $item) {
            DanhMuc::create([
                'ten_dm' => $item,
            ]);
        };
    }
}
