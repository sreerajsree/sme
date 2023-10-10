<?php

namespace App\Repositories\Dashboard;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;

/**
 * Category entity database query class.
 *
 * @author Sreeraj S
 */
class CategoryRepository
{
    /**
     * Fetch all categories from the database.
     *
     * @return \App\Models\Category[]
     */
    public static function getAll()
    {
        return Category::orderBy('id','desc')->paginate(15);
    }

    /**
     * Save category instance to the database.
     *
     * @param \App\Http\Requests\CategoryRequest  $request
     */
    public static function save(CategoryRequest $request)
    {
        Category::create($request->all());
    }

    /**
     * Update category instance in the database.
     *
     * @param \App\Http\Requests\CategoryRequest  $request
     * @param  \App\Models\Category  $category
     */
    public static function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
    }

    /**
     * Delete category instance from the database.
     *
     * @param  \App\Models\Category  $category
     */
    public static function delete(Category $category)
    {
        $category->delete();
    }
}
