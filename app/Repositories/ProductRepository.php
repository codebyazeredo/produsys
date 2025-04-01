<?php

namespace App\Repositories;

use App\Http\Dtos\ProductDTO;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{
    public function all(): Collection
    {
        return Product::with(['category', 'supplier'])->get();
    }

    public function find(int $id): ?Product
    {
        return Product::find($id);
    }

    public function create(ProductDTO $productDTO): Product
    {
        $product = new Product();
        $product->setNameAttribute($productDTO->name);
        $product->setCategoryIdAttribute($productDTO->category_id);
        $product->setSupplierIdAttribute($productDTO->supplier_id);
        $product->setUnitMeasureIdAttribute($productDTO->unit_measure_id);
        $product->setPriceAttribute($productDTO->price);

        $product->save();
        return $product;
    }

    public function update(Product $product, ProductDTO $productDTO): Product
    {
        $product->setNameAttribute($productDTO->name);
        $product->setCategoryIdAttribute($productDTO->category_id);
        $product->setSupplierIdAttribute($productDTO->supplier_id);
        $product->setUnitMeasureIdAttribute($productDTO->unit_measure_id);
        $product->setPriceAttribute($productDTO->price);

        $product->save();
        return $product;
    }

    public function delete(Product $product): bool
    {
        $product->balance()->delete();
        return $product->delete();
    }
}
