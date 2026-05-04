<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function storeProduct(array $data)
    {
        return Product::create($data);
    }

    public function getAllProducts()
    {
        return Product::all();
    }

    public function updateProduct($id, array $data)
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        return $product->delete();
    }
}