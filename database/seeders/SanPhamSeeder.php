<?php

namespace Database\Seeders;

use App\Models\LoaiDanhMuc;
use App\Models\VatLieu;
use App\Models\SanPham;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        
        $imagesUrl = [
            'https://res.cloudinary.com/olatravelfallguys/image/upload/v1679142123/wgrcujv6boj8loyh6sep.jpg',
            'https://res.cloudinary.com/olatravelfallguys/image/upload/v1679142121/bgigd6b18bsvjkqtq29o.jpg',
            'https://res.cloudinary.com/olatravelfallguys/image/upload/v1679142119/cepl25rbv54jzc3mj2ll.jpg',
            'https://res.cloudinary.com/olatravelfallguys/image/upload/v1679142116/jo6dcy6rg3ktv61nh8i9.jpg',
            'https://res.cloudinary.com/olatravelfallguys/image/upload/v1679135319/ujh7nuuxwwkzox2fkaia.jpg',
            'https://res.cloudinary.com/olatravelfallguys/image/upload/v1679135318/lw7epqm1wxo41bg7yda5.jpg',
            'https://res.cloudinary.com/olatravelfallguys/image/upload/v1679135314/gkxlf9vydhnqpzq9pfgr.jpg',
        ];
        foreach (LoaiDanhMuc::all() as $loaiDanhMuc) {
            foreach (range(1, 10) as $item) {
                foreach (VatLieu::all() as $vl) {
                    $vl = rand(1, $vl->id);
                };
                $giaGoc = rand(500000, 5000000);
                $phanTram = array_rand([2, 5, 8, 10, 12, 15, 20]);
                $soLuong = rand(10, 200);
                $faker = Faker::create();
                $rate = rand(4, 5);
                $hot = [0,1];
                $view = array_rand([202,233,243,537,643,342,422,665,443,445,677,442,22,345,986,643]);
                SanPham::create([
                    'id_loai_dm' =>  $loaiDanhMuc->id,
                    'id_vl' => $vl,
                    'tenSP' =>  $loaiDanhMuc->tenLoaidm . " " . $item,
                    'anh' =>  $imagesUrl[rand(0, 6)],
                    'gia_goc' =>  $giaGoc,
                    'so_luong' => $soLuong,
                    'gia_khuyen_mai' =>  $giaGoc - $giaGoc * $phanTram / 100,
                    'phantram' => $phanTram,
                    'tinh_trang' =>  1,
                    'mo_ta' =>  $faker->Text,
                    'rate' => $rate,
                    'hot' => array_rand($hot),
                    'view' => $view
                ]);
            }
        }
    }
}
