<?php
namespace App\Services\ServicesWeb;

use App\Services\ServicesInterface\ProductServiceInterface;
use App\Models\wishlist;

class ProductService implements ProductServiceInterface
{
    
     /**
     * Search product by name
     *
     * @return void
     */
    public function searchProductByName(string $name): void
    {
    }

    public function removeWishlistById(int $id, int $user): void
    {
        $param = [
            'id' => $id,
            'user_id' => $user
        ];
        wishlist::where($param)->delete();
    }
}
