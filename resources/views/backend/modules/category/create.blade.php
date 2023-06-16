<x-app-layout>
    <!-- Site Title -->
    <x-slot:title>Add New Category</x-slot:title>

    <x-slot:content-header>
        <!-- Title -->
        <div class="col-sm-6">
            <h1 class="m-0">Add New Category</h1>
        </div>
    </x-slot:content-header>

    <form class="row g-3" action="{{ route('admin.category.store') }}" method="post">
        @csrf

        <!-- Name -->
        <div class="col-md-6">
            <label for="categoryName" class="form-label">Name</label>

            <div class="input-group mb-3">
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter category name" aria-label="Enter category name" required>
                <button class="btn btn-outline-primary ml-2" type="submit" id="button-addon2">Create category</button>
            </div>

            <!-- Validation messages -->
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror

            <!-- Success messages -->
            @if ( session()->has('success') )
                <p class="text-success">{{ session('success') }}</p>
            @endif
        </div>
    </form>


</x-app-layout>
