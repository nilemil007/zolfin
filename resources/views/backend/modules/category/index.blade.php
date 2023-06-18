<x-app-layout>
    <!-- Site Title -->
    <x-slot:title>Category</x-slot:title>

    <x-slot:content-header>
        <!-- Title -->
        <div class="col-sm-6">
            <h1 class="m-0">All Category</h1>
        </div>
    </x-slot:content-header>

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
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <button type="button" id="del" class="btn btn-sm btn-danger">Delete</button>
                        </div>
                        {{--  --}}

                        <form id="cat_delete" action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
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

@push('scripts')

<script>
    $(document).on('click','#del', function(e){
        e.preventDefault();
        var url = $(this).attr('href');

        Swal.fire({
            title: 'Are you sure?',
            text: 'Delete data?',
            icon: 'warning',
            showCanelButton: true,
            confirmButtonText: 'Yes, delete',
        }).then((result) => {
            if(result.isConfirmed){
                window.location.href = url,

                Swal.fire(
                    'Deleted!',
                    'Category is deleted.',
                    'success',
                )
            }
        })
    });
</script>

@endpush
