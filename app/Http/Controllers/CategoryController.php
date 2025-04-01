<?php

namespace App\Http\Controllers;

use App\Http\Dtos\CategoryDTO;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): View
    {
        $categories = $this->categoryService->getAllCategories();
        return view('categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $categoryDTO = CategoryDTO::fromArray($request->validated());
        $this->categoryService->createCategory($categoryDTO);

        return redirect()->route('categories.index')->with('success', 'Categoria criada com sucesso!');
    }

    public function edit(int $id): View|RedirectResponse
    {
        $category = $this->categoryService->getCategoryById($id);
        if (!$category) {
            return redirect()->route('categories.index')->with('error', 'Categoria não encontrada.');
        }

        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, int $id): RedirectResponse
    {
        $categoryDTO = CategoryDTO::fromArray($request->validated());
        $updated = $this->categoryService->updateCategory($id, $categoryDTO);

        if (!$updated) {
            return redirect()->route('categories.index')->with('error', 'Categoria não encontrada.');
        }

        return redirect()->route('categories.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $deleted = $this->categoryService->deleteCategory($id);

        if (!$deleted) {
            return redirect()->route('categories.index')->with('error', 'Categoria não encontrada.');
        }

        return redirect()->route('categories.index')->with('success', 'Categoria excluída com sucesso!');
    }
}
