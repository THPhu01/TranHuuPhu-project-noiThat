<?php

namespace Database\Seeders;

use App\Models\LoaiDanhMuc;
use Illuminate\Database\Seeder;

class LoaiDanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loaiDanhMuc = [
            [1,'Sofa'],[1,'Sofa góc'],[1,'Armchair'],[1,'Ghế dài & đôn'],[1,'Ghế thư giãn'],
            [2,'Bàn nước'],[2,'Bàn ăn'],[2,'Bàn bên'],[2,'Bàn làm việc'],[2,'Bàn trang điểm'],
            [3,'Ghế ăn '],[3,'Ghế bar'],[3,'Ghế làm việc'],[4,'Giường'],[4,'Bàn đầu giường'],[4,'Nệm'],
            [5,'Tủ tivi'],[5,'Tủ ly'],[5,'Tủ rượu'],[5,'Xe đẩy'],[5,'Tủ hộc kéo'],[5,'Tủ áo'],[5,'Tủ giầy'],[5,'Kệ phòng khách'],
            [6,'Tủ bếp'],[6,'Phụ kiện bếp'],
            [7,'Bình trang trí'],[7,'Đèn trang trí'],[7,'Đồ trang trí Noel'],[7,'Đồng hồ'],[7,'Dụng cụ bếp'],[7,'Gối và thú bông'],
            [7,'Hàng trang trí khác'],[7,'Hoa & Cây'],[7,'Khung hình'],[7,'Sản phẩm khác'],
            [7,'Thảm'],[7,'Mền'],[7,'Khung gương'],[7,'Tranh'],
            [8,'Bàn ngoài trời'],[8,'Ghế ngoài trời']
        ];
        foreach ($loaiDanhMuc as $item) {
            LoaiDanhMuc::create([
                'id_dm'=>$item[0],
                'tenLoaidm' => $item[1]
            ]);
        }
    }
}
