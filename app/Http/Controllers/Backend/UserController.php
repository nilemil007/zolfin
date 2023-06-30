<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\CheckExistingPassword;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->get();

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
    public function edit(User $user)
    {
        return view('backend.modules.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $information = $request->validate([
            'name' => ['required','min:3','max:100','string'],
            'username' => ['required','min:3','max:100','unique:users,username,'.$user->id],
            'phone' => ['required','digits:11','unique:users,phone,'.$user->id],
            'email' => ['required','email','unique:users,email,'.$user->id],
            'role' => ['required'],
            'image' => ['sometimes','image','mimes:jpg,jpeg,png'],
            'current_password' => ['nullable', new CheckExistingPassword($user)],
            'password' => ['nullable', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
         ]);

         if ($request->hasFile('image')) {

            if ( File::exists( public_path( $user->image ) ) )
            {
                File::delete( $user->image );
            }

            $name = 'user.'.$request->image->hashname();
            $request->image->storeAs('public/users', $name);
            $information['image'] = $name;
         }

         if ($user->update($information)) {
            Toastr::success('User updated successfully.', 'Success');
         }else{
            Toastr::error('User not updated.', 'Error');
         }

         return to_route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            if ( File::exists( public_path( $user->image ) ) )
            {
                File::delete( $user->image );
            }

            Toastr::success('User deleted successfully.', 'Success');
         }else{
            Toastr::error('User not deleted.', 'Error');
         }

         return to_route('admin.user.index');
    }
}
