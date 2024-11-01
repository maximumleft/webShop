<?php

namespace App\Repositories\Interfaces;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function create(array $productData): void;

    public function update(Product $product, array $productData): void;

    public function delete(Product $product);
}
