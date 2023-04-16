<?php
namespace App\Services\ServicesInterface;

interface ProductServiceInterface
{

    /**
     * Search product by name
     *
     * @return void
     */
    public function searchProductByName(string $name): void;


    public function removeWishlistById(int $id, int $user): void;
}
