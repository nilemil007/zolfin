<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::latest()->get();

        return view('backend.modules.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('backend.modules.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permission = $request->validate([
            'name' => ['required','min:3','max:30'],
            'group_name' => ['required'],
        ]);

        if(Permission::create($permission)){
            Toastr::success('Permission created successfully.', 'Success');
        }else{
            Toastr::error('Permission not created.', 'Error');
        }

        return to_route('admin.permission.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'PermissionController show method.';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('backend.modules.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $value = $request->validate([
            'name' => ['required','min:3','max:30'],
            'group_name' => ['required'],
        ]);

        if($permission->update($value)){
            Toastr::success('Permission updated successfully.', 'Success');
        }else{
            Toastr::error('Permission not updated.', 'Error');
        }

        return to_route('admin.permission.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        if($permission->delete()){
            Toastr::success('Permission deleted successfully.', 'Success');
        }else{
            Toastr::error('Permission not deleted.', 'Error');
        }

        return to_route('admin.permission.index');
    }
}
