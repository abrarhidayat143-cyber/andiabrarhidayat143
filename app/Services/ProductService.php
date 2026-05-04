<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function createProduct(array $data)
    {
        // Logika untuk menyimpan produk ke database
        return Product::create($data);
    }
}