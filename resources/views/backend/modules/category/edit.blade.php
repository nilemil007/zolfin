<x-app-layout>
    <!-- Site Title -->
    <x-slot:title>Edit Category</x-slot:title>

    <x-slot:content-header>
        <!-- Title -->
        <div class="col-sm-6">
            <h1 class="m-0">Edit Category</h1>
        </div>
    </x-slot:content-header>

    <form class="mt-5" action="{{ route('admin.category.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}" placeholder="Enter category name" id="categoryName" required>
                <!-- Validation messages -->
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Update button -->
        <button class="btn btn-primary mt-4" type="submit"><i class="fas fa-sync-alt"></i> Update</button>
    </form>

</x-app-layout>
