<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('backend.modules.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('backend.modules.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $user = $request->validate([
            'name' => ['required','min:3','max:100','string'],
            'username' => ['required','min:3','max:100','unique:users,username'],
            'phone' => ['required','digits:11','unique:users,phone'],
            'email' => ['required','email','unique:users,email'],
            'role' => ['required'],
            'image' => ['sometimes','image','mimes:jpg,jpeg,png'],
            'password' => ['required','confirmed','min:8'],
         ]);

         if ($request->hasFile('image')) {
            $name = 'user.'.$request->image->hashname();
            $request->image->storeAs('public/users', $name);
            $user['image'] = $name;
         }

         if (User::create($user)) {
            Toastr::success('New user created successfully.', 'Success');
         }else{
            Toastr::error('User not created.', 'Error');
         }

         return to_route('admin.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'UserController show method.';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return 'UserController edit method.';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return 'UserController update method.';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'UserController destroy method.';
    }
}
