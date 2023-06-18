<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory
    {
        $categories = Category::latest()->get();

        return view('backend.modules.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory
    {
        return view('backend.modules.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string']
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        if($category->save())
        {
            Toastr::success('Category created successfully.', 'Success');
        }else{
            Toastr::error('Category not created.', 'Error');
        }

        return redirect()->route('admin.category.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'category show' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('backend.modules.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required','string']
        ]);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        if($category->update())
        {
            Toastr::success('Category updated successfully.', 'Success');
        }else{
            Toastr::error('Category not updated.', 'Error');
        }

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return 'category destroy';


        // if($category->destroy())
        // {
        //     return redirect()->route('admin.category.index')->with('success','Category deleted successfully.');
        // }
    }
}
