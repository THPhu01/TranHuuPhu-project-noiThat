<?php

namespace Database\Seeders;

use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\SanPham;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class DonHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (User::all() as $user) {
            $faker = Faker::create();
            $donHang = new DonHang();
            $donHang->id_user = $user->id;
            $donHang->ghi_chu = $faker->Text;
            $donHang->trang_thai = rand(0, 4);
            $donHang->ho_va_ten = $faker->name();
            $donHang->phone = $faker->phoneNumber;
            $donHang->email = $faker->unique()->safeEmail();
            $donHang->payment_method =rand(0, 1);
            $donHang->ghi_chu = $faker->Text;
            $donHang->save();
            $sanPhams = SanPham::inRandomOrder()
                ->limit(rand(1, 7))
                ->get();
            $tong = 0;
            $tongGoc = 0;
            foreach ($sanPhams as $sp) {
                $sl = rand(1, 10);
                $chiTietDonHang = new ChiTietDonHang();
                $chiTietDonHang->id_dh = $donHang->id;
                $chiTietDonHang->id_sp = $sp->id;
                $chiTietDonHang->so_luong = $sl;
                $chiTietDonHang->gia_sp = $sp->gia_khuyen_mai;
                $chiTietDonHang->tong = $sp->gia_khuyen_mai * $sl;
                $chiTietDonHang->save();
                $tong +=  $sp->gia_khuyen_mai * $sl;
                $tongGoc += $sp->gia_goc * $sl;
            }
            $donHang->tong = $tong;
            $donHang->giam_gia = $tongGoc - $tong;
            $donHang->gia_goc  = $tongGoc;
            $donHang->save();
        }
    }
}
