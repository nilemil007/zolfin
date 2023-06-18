<x-app-layout>
    <!-- Site Title -->
    <x-slot:title>Category</x-slot:title>

    <x-slot:content-header>
        <!-- Title -->
        <div class="col-sm-6">
            <h1 class="m-0">All Category</h1>
        </div>
    </x-slot:content-header>

    <div class="mb-3 d-flex justify-content-end">
        <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-primary m-0"><i class="fas fa-plus"></i> Add new category</a>
    </div>

    {{ $dataTable->table() }}

    {{-- <table class="table table-sm table-striped table-hover table-bordered">
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
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <!-- Edit button -->
                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            <!-- Delete button -->
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delCategory{{ $category->id }}"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </td>
                    <!-- Modal -->
                    <div class="modal fade" id="delCategory{{ $category->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure to delete <strong>{{ $category->name }}</strong> category?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('cat_delete{{ $category->id }}').submit()">Yes, delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete category form -->
                    <form id="cat_delete{{ $category->id }}" action="{{ route('admin.category.destroy', $category->id) }}" method="POST" hidden="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                </tr>
            @empty
                <tr>
                    <td>No category found.</td>
                </tr>
            @endforelse
        </tbody>
      </table> --}}

      {{-- {{ $categories->links('pagination::bootstrap-5') }} --}}

      @push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

</x-app-layout>