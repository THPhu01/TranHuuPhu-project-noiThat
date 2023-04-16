<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\wishlist;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_product = [1,2,3,4,5];

        for ($i=0; $i<count($array_product); $i++) {
            wishlist::create([
                'user_id' => 1,
                'product_id' => $array_product[$i]
            ]);
        }
    }
}
