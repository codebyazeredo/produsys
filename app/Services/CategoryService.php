<?php

namespace App\Services;

use App\Http\Dtos\CategoryDTO;
use App\Models\Category;
use App\Repositories\CategoryRepository;

class CategoryService
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->all();
    }

    public function getCategoryById(int $id): ?Category
    {
        return $this->categoryRepository->find($id);
    }

    public function createCategory(CategoryDTO $categoryDTO): Category
    {
        return $this->categoryRepository->create($categoryDTO);
    }

    public function updateCategory(int $id, CategoryDTO $categoryDTO): ?Category
    {
        $category = $this->categoryRepository->find($id);
        if (!$category) {
            return null;
        }

        return $this->categoryRepository->update($category, $categoryDTO);
    }

    public function deleteCategory(int $id): bool
    {
        $category = $this->categoryRepository->find($id);
        if (!$category) {
            return false;
        }

        return $this->categoryRepository->delete($category);
    }
}
