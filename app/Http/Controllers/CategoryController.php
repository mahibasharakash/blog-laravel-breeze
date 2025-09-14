<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $searchQuery = $request->input('search');
        $categories = Category::orderBy('created_at', 'desc');
        if ($searchQuery) {
            $categories->where('name', 'LIKE', "%{$searchQuery}%");
        }
        $categories = $categories->paginate(10);
        return view('category.list', compact('categories', 'searchQuery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();
        $validated['slug'] = str($validated['name'])->slug();
        $category = Category::create($validated);
        if($category->wasRecentlyCreated) {
            return redirect()->route('category.index')->with('success', 'Category Created Successfully');
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();
        $validated['slug'] = str($validated['name'])->slug();
        $category->update($validated);

        return redirect()->route('category.index')->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): \Illuminate\Http\RedirectResponse
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category Deleted Successfully');
    }

}
