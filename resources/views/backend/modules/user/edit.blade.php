<x-app-layout>
    <!-- Site Title -->
    <x-slot:title>Edit User</x-slot:title>

    <x-slot:content-header>
        <!-- Title -->
        <div class="col-sm-6">
            <h1 class="m-0">Edit User</h1>
        </div>
    </x-slot:content-header>

    <form class="row mt-4 g-3 form-horizontal" action="{{ route('admin.user.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Image -->
        <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input type="file" name="image" class="form-control" id="image" accept="image/*" onchange="loadFile(event)">
                @error('image') <div></div><small class="text-danger">{{ $message }}</small></div> @enderror
                @if(!empty($user->image))
                    <img src="{{ asset($user->image) }}" class="mt-2" id="output" width="200px"/>
                @else
                    <img class="mt-3" id="output" width="200px">
                @endif
            </div>
        </div>

        <!-- Name -->
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" id="name" placeholder="Enter full name">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Username -->
        <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" id="username" placeholder="Enter username">
                @error('username') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Phone -->
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="number" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}" id="phone" placeholder="Enter phone number">
                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Email -->
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" id="email" placeholder="Enter email address">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Role -->
        <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                <select class="form-select" name="role" id="role" data-live-search="true">
                    <option value="" disabled selected>-- Select role --</option>
                    <option {{ $user->role == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                    <option {{ $user->role == 'author' ? 'selected' : '' }} value="author">Author</option>
                    <option {{ $user->role == 'editor' ? 'selected' : '' }} value="editor">Editor</option>
                    <option {{ $user->role == 'modarator' ? 'selected' : '' }} value="modarator">Modarator</option>
                </select>
                @error('role') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Current Password -->
        <div class="form-group row">
            <label for="current_password" class="col-sm-2 col-form-label">Current Password</label>
            <div class="col-sm-10">
                <input type="password" name="current_password" class="form-control" id="current_password" placeholder="Enter current password">
                @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- New Password -->
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">New Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter new password">
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="form-group row">
            <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password_confirmation" placeholder="Enter confirm password">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mb-3">
            <button type="submit" class="btn btn-sm btn-primary text-bold">Save changes</button>
        </div>
    </form>


    @push('scripts')

        <script>

            $(document).ready(function() {
                $('.form-select').select2();
            });

            // Preview post thumbnail
            const loadFile = function (event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        </script>
    @endpush

</x-app-layout>
