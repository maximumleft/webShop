<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function create(array $productData): void
    {
        Product::firstOrCreate([
            'email' => $productData['email'],
        ], $productData);
    }

    public function update(Product $product, array $productData): void
    {
        $product->update($productData);
    }

    public function delete(Product $product): bool
    {
        return $product->update(['deleted_at' => now()]);
    }
}
