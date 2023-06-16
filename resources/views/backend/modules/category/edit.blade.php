<x-app-layout>
    <!-- Site Title -->
    <x-slot:title>Edit Category</x-slot:title>

    <x-slot:content-header>
        <!-- Title -->
        <div class="col-sm-6">
            <h1 class="m-0">Edit Category</h1>
        </div>
    </x-slot:content-header>

    <form class="row g-3" action="{{ route('admin.category.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="col-md-6">
            <label for="categoryName" class="form-label">Name</label>

            <div class="input-group mb-3">
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}" placeholder="Enter category name" aria-label="Enter category name" id="categoryName" required>
                <button class="btn btn-outline-primary ml-2" type="submit">Update category</button>
            </div>

            <!-- Validation messages -->
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </form>


</x-app-layout>
