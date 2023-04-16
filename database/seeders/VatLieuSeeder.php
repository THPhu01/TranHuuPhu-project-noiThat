<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VatLieu;

class VatLieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $ten_vl = [
            'Da',
            'Đá',
            'Gỗ',
            'Gốm sứ',
            'Kim loại',
            'Kính',
            'Thủy tinh',
            'Vải',
            'Nhôm',
            'Inox',
            'Nhựa tổng hợp',
            'Sợi dệt'
            

        ];
        foreach ($ten_vl as $item) {
            VatLieu::create([
                'ten_vl' => $item,
            ]);
        };
    }
}
