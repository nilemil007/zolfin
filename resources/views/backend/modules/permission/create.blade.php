<x-app-layout>
    <!-- Site Title -->
    <x-slot:title>Add New Permission</x-slot:title>

    <x-slot:content-header>
        <!-- Title -->
        <div class="col-sm-6">
            <h1 class="m-0">Add New Permission</h1>
        </div>
    </x-slot:content-header>

    <form class="row mt-4 g-3 form-horizontal" action="{{ route('admin.permission.store') }}" method="post">
        @csrf

        <!-- Name -->
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="name" placeholder="Enter permission name">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Group Name -->
        <div class="form-group row">
            <label for="group_name" class="col-sm-2 col-form-label">Group Name</label>
            <div class="col-sm-10">
                <select class="form-select" name="group_name" id="group_name" data-live-search="true">
                    <option value="" disabled selected>-- Select permission --</option>
                    <option value="post">Post</option>
                    <option value="category">Category</option>
                    <option value="user">User</option>
                    <option value="roles">Roles</option>
                    <option value="permissions">Permissions</option>
                </select>
                @error('group_name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mb-3">
            <button type="submit" class="btn btn-sm btn-primary text-bold">Create New Permission</button>
        </div>
    </form>


    @push('scripts')

        <script>

            $(document).ready(function() {
                $('.form-select').select2();
            });

        </script>
    @endpush

</x-app-layout>
