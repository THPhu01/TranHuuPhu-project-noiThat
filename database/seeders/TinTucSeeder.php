<?php

namespace Database\Seeders;

use App\Models\DanhMucTin;
use App\Models\DmucBlog;
use App\Models\TinTuc;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class TinTucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (DmucBlog::all() as $danhMucTin) {
            foreach (range(1, 10) as $item) {
                $views = rand(50, 1000);
                $faker = Faker::create();
                TinTuc::create([
                    'id_dm_tt' =>  $danhMucTin->id,
                    'tieu_de' =>  $danhMucTin->ten . " " . $item,
                    'tom_tat' =>  "Tom tat" . $danhMucTin->ten . " " . $item,
                    'noi_dung' =>  $faker->Text,
                    'views' => $views,
                    'anh' => Str::random(20) . '.' . 'png',
                ]);
            }
        }
    }
}
