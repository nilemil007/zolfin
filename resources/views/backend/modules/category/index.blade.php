<x-app-layout>
    <!-- Site Title -->
    <x-slot:title>Category</x-slot:title>

    <x-slot:content-header>
        <!-- Title -->
        <div class="col-sm-6">
            <h1 class="m-0">All Category</h1>
        </div>
    </x-slot:content-header>

    <!-- Success messages -->
    @if ( session()->has('success') )
        <p class="text-success">{{ session('success') }}</p>
    @endif

    <table class="table table-sm table-striped table-hover table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($categories as $sl => $category)
                <tr>
                    <th scope="row">{{ ++$sl }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>

                        
                        <a href="{{ route('admin.category.destroy', $category->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No category found.</td>
                </tr>
            @endforelse
        </tbody>
      </table>

</x-app-layout>
