<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductRepositoryInterface $productRepository
    ){
    }

    public function show(Product $product): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'product' => $product
        ]);
    }

    public function create(ProductStoreRequest $request): JsonResponse
    {
        $data = $request->validated();
        $this->productRepository->create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully!'
        ]);
    }

    public function update(Product $product, ProductUpdateRequest $request): JsonResponse
    {
        $data = $request->validated();
        $this->productRepository->update($product, $data);

        return response()->json([
            'status' => 'success',
            'message' => 'Product updated successfully!'
        ]);
    }

    public function delete(Product $product): JsonResponse
    {
        $this->productRepository->delete($product);

        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted successfully!'
        ]);
    }
}
