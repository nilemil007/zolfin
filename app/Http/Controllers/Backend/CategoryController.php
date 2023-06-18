<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CategoriesDataTable;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoriesDataTable $dataTable): View|Application|Factory
    {
        // $categories = Category::latest()->paginate(5);

        // return view('backend.modules.category.index', compact('categories'));

        return $dataTable->render('backend.modules.category.index');
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required','string']
        ]);

        if( Category::create( $request->only('name') ) )
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
    public function edit(Category $category): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('backend.modules.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'name' => ['required','string']
        ]);

        if( $category->update( $request->only('name') ) )
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
    public function destroy(Category $category): RedirectResponse
    {
         if($category->delete())
         {
             Toastr::success('Category deleted successfully.', 'Success');
         }else{
             Toastr::error('Category not deleted.', 'Error');
         }

        return redirect()->route('admin.category.index');
    }
}
