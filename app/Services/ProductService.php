<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Http\Dtos\ProductDTO;
use App\Models\Product;
use App\Repositories\SupplierRepository;
use App\Repositories\UnitMeasureRepository;

class ProductService
{
    private ProductRepository $productRepository;
    private CategoryRepository $categoryRepository;
    private SupplierRepository $supplierRepository;
    private UnitMeasureRepository $unitMeasureRepository;

    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        SupplierRepository $supplierRepository,
        UnitMeasureRepository $unitMeasureRepository
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->supplierRepository = $supplierRepository;
        $this->unitMeasureRepository = $unitMeasureRepository;
    }

    public function getAllProducts()
    {
        return $this->productRepository->all();
    }

    public function getProductById(int $id): ?Product
    {
        return $this->productRepository->find($id);
    }

    public function createProduct(ProductDTO $productDTO): Product
    {
        return $this->productRepository->create($productDTO);
    }

    public function updateProduct(Product $product, ProductDTO $productDTO): Product
    {
        // Passa a responsabilidade de atualizar para o Repository
        return $this->productRepository->update($product, $productDTO);
    }

    public function deleteProduct(Product $product): bool
    {
        return $this->productRepository->delete($product);
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->all();
    }

    public function getAllSuppliers()
    {
        return $this->supplierRepository->all();
    }

    public function getAllUnitMeasures()
    {
        return $this->unitMeasureRepository->all();
    }
}
