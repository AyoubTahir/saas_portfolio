<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Services\Perform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.portfolio.categories.index', compact(['categories']));
    }

    public function store(CategoryRequest $request)
    {
        Perform::createOrUpdate(Category::class, $request);

        return redirect()->route('portfolio.categories.index')->with(['success' => 'changed added successfully']);
    }

    public function edit($id)
    {
        $currentCategory = Perform::findFirstOrFail(Category::class, $id);

        $categories = Category::all();

        return view('admin.portfolio.categories.index', compact(['categories', 'currentCategory']));
    }

    public function update(CategoryRequest $request, $id)
    {
        Perform::createOrUpdate(Category::class, $request, $id);

        return redirect()->route('portfolio.categories.index')->with(['success' => 'changed updated successfully']);
    }

    public function delete($id)
    {
        $category = Perform::findFirstOrFail(Category::class, $id);

        $category->delete();

        return redirect()->route('portfolio.categories.index')->with(['success' => 'Category has been deleted.']);
    }

    public function destroy(Request $request)
    {
        foreach ($request->ids as $id) {

            $category = Perform::findFirstOrFail(Category::class, $id);

            $category->delete();
        }

        return redirect()->route('portfolio.categories.index')->with(['success' => 'Categories has been deleted.']);
    }
}
