<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Exception;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    // 1. Tampilkan Data
    public function index()
    {
        $products = $this->productService->getAllProducts();
        return response()->json($products);
    }

    // 2. Tambah Data (dengan Validasi & Error Handling)
    public function store(Request $request)
    {
        // Request Validasi
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
        ]);

        try {
            $product = $this->productService->storeProduct($validated);
            return response()->json(['message' => 'Berhasil tambah data', 'data' => $product], 201);
        } catch (Exception $e) {
            // Error Handling
            return response()->json(['message' => 'Gagal tambah data', 'error' => $e->getMessage()], 500);
        }
    }

    // 3. Ubah Data
    public function update(Request $request, $id)
    {
        $product = $this->productService->updateProduct($id, $request->all());
        return response()->json(['message' => 'Berhasil ubah data', 'data' => $product]);
    }

    // 4. Hapus Data
    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return response()->json(['message' => 'Berhasil hapus data']);
    }
}