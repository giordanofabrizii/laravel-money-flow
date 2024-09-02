<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    // https://api.iconify.design

    public function index()
    {
        $categories = Category::all();

        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data  = $request->validated();

        $newCategory = new Category($data);
        $newCategory->save();

        return redirect()->Route('categories.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        $category->update($data);
        return redirect()->route('categories.index'
    );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}

