<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::latest()->get();

        return view('backend.modules.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.modules.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = $request->validate([
            'name' => ['required','min:3','max:30'],
        ]);

        if(Role::create($role)){
            Toastr::success('Role created successfully.', 'Success');
        }else{
            Toastr::error('Role not created.', 'Error');
        }

        return to_route('admin.role.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'RoleController show method.';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('backend.modules.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $value = $request->validate([
            'name' => ['required','min:3','max:30'],
        ]);

        if($role->update($value)){
            Toastr::success('Role updated successfully.', 'Success');
        }else{
            Toastr::error('Role not updated.', 'Error');
        }

        return to_route('admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if($role->delete()){
            Toastr::success('Role deleted successfully.', 'Success');
        }else{
            Toastr::error('Role not deleted.', 'Error');
        }

        return to_route('admin.role.index');
    }
}
