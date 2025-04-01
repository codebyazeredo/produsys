<?php

namespace App\Http\Controllers;

use App\Http\Dtos\ProductDTO;
use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): View
    {
        $products = $this->productService->getAllProducts();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->productService->getAllCategories();
        $suppliers = $this->productService->getAllSuppliers();
        $unitMeasures = $this->productService->getAllUnitMeasures();

        return view('products.create', compact('categories', 'suppliers', 'unitMeasures'));
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $productDTO = ProductDTO::fromArray($request->validated());
        $this->productService->createProduct($productDTO);

        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');
    }

    public function edit(int $id): View|RedirectResponse
    {
        $product = $this->productService->getProductById($id);
        $categories = $this->productService->getAllCategories();
        $suppliers = $this->productService->getAllSuppliers();
        $unitMeasures = $this->productService->getAllUnitMeasures();

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Produto não encontrado.');
        }

        return view('products.edit', compact('product', 'categories', 'suppliers', 'unitMeasures'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = $this->productService->getProductById($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Produto não encontrado.');
        }

        $productDTO = new ProductDTO($request->validated());
        $this->productService->updateProduct($product, $productDTO);

        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $deleted = $this->productService->deleteProduct($id);

        if (!$deleted) {
            return redirect()->route('products.index')->with('error', 'Produto não encontrado.');
        }

        return redirect()->route('products.index')->with('success', 'Produto excluído com sucesso!');
    }
}
