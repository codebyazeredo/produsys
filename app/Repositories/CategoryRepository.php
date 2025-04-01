<?php

namespace App\Repositories;

use App\Http\Dtos\CategoryDTO;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    public function all(): Collection
    {
        return Category::orderBy('name')->get();
    }

    public function find(int $id): ?Category
    {
        return Category::find($id);
    }

    public function create(CategoryDTO $categoryDTO): Category
    {
        $category = new Category();
        $category->setNameAttribute($categoryDTO->name);
        $category->description = $categoryDTO->description;

        $category->save();

        return $category;
    }

    public function update(Category $category, CategoryDTO $categoryDTO): Category
    {
        $category->setNameAttribute($categoryDTO->name);
        $category->description = $categoryDTO->description;

        $category->save();

        return $category;
    }

    public function delete(Category $category): bool
    {
        return $category->delete();
    }
}
