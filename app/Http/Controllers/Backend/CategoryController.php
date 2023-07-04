<?php


namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Validator::make($request->only('name'),[
            'name' => ['required','min:3','string'],
        ]);

        if ($category->fails()) {
            return to_route('admin.category.index')->withErrors($category)->withInput();
        }

         if( Category::create( $request->only('name') ) )
         {
             Toastr::success('Category created successfully.', 'Success');
         }else{
             Toastr::error('Category not created.', 'Error');
         }

         return to_route('admin.category.index');
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

        return to_route('admin.category.index');
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

        return to_route('admin.category.index');
    }
}
