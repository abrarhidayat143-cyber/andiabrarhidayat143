<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService; // Pastikan ini sesuai folder service kamu

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        // Simpan lewat Model (atau lewat Service jika logikanya di sana)
        Product::create($validated);

        return response()->json(['message' => 'Produk berhasil ditambah!'], 201);
    }
}