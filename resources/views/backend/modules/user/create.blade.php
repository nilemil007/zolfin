<x-app-layout>
    <!-- Site Title -->
    <x-slot:title>Add New User</x-slot:title>

    <x-slot:content-header>
        <!-- Title -->
        <div class="col-sm-6">
            <h1 class="m-0">Add New User</h1>
        </div>
    </x-slot:content-header>

    <form class="row mt-4 g-3 form-horizontal" action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- Image -->
        <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input type="file" name="image" class="form-control" id="image" accept="image/*" onchange="loadFile(event)">
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                <img class="mt-3" id="output" width="200px">
            </div>
        </div>

        <!-- Name -->
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="name" placeholder="Enter full name">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Username -->
        <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" name="username" class="form-control" value="{{ old('username') }}" id="username" placeholder="Enter username">
                @error('username') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Phone -->
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="number" name="phone" class="form-control" value="{{ old('phone') }}" id="phone" placeholder="Enter phone number">
                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Email -->
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="email" placeholder="Enter email address">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Role -->
        <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                <select class="form-select" name="role" id="role" data-live-search="true">
                    <option value="" disabled selected>-- Select role --</option>
                    <option value="admin">Admin</option>
                    <option value="author">Author</option>
                    <option value="editor">Editor</option>
                    <option value="modarator">Modarator</option>
                </select>
                @error('role') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Password -->
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="form-group row">
            <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Enter confirm password">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mb-3">
            <button type="submit" class="btn btn-sm btn-primary text-bold">Create New User</button>
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
