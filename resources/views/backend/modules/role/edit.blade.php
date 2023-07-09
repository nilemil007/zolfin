<x-app-layout>
    <!-- Site Title -->
    <x-slot:title>Edit Role</x-slot:title>

    <x-slot:content-header>
        <!-- Title -->
        <div class="col-sm-6">
            <h1 class="m-0">Edit Role</h1>
        </div>
    </x-slot:content-header>

    <form class="row mt-4 g-3 form-horizontal" action="{{ route('admin.role.update', $role->id) }}" method="post">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" value="{{ old('name', $role->name) }}" id="name" placeholder="Enter role name">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mb-3">
            <button type="submit" class="btn btn-sm btn-primary text-bold">Update Role</button>
        </div>
    </form>

</x-app-layout>
