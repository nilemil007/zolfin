<x-app-layout>
    <!-- Site Title -->
    <x-slot:title>Categories</x-slot:title>

    <x-slot:content-header>
        <!-- Title -->
        <div class="col-sm-6">
            <h1 class="m-0">Categories</h1>
        </div>
    </x-slot:content-header>

    <div class="row">
        <div class="col-md-4">
            <form id="categoryForm" class="row g-3" action="{{ route('admin.category.store') }}" method="post">
                @csrf

                <!-- Name -->
                <div id="categoryName" class="col-12">
                    <label for="categoryName" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control
                    @error('name') is-invalid @enderror" placeholder="Enter category name" required autofocus>
                    @error('name')<small class="text-danger font-weight-bold">{{ $message }}</small>@enderror
                </div>

                <!-- Submit button -->
                <div class="col-12">
                    <button class="btn btn-primary" id="submit" type="submit" id="button-addon2">
                        <i class="fas fa-plus"></i> Add New Category
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <div class="table-responsive">
                <table id="tbl_categories" class="table table-sm table-striped table-hover table-bordered">
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
            </table>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#tbl_categories').DataTable();

                {{--$('#categoryForm').on('submit',function(e){--}}
                {{--    e.preventDefault();--}}

                {{--    $.ajaxSetup({--}}
                {{--        headers: {--}}
                {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                {{--        }--}}
                {{--    });--}}

                {{--    $.ajax({--}}
                {{--        url: "{{ route('admin.category.store') }}",--}}
                {{--        type: "POST",--}}
                {{--        data: new FormData(this),--}}
                {{--        dataType: "json",--}}
                {{--        contentType: false,--}}
                {{--        processData: false,--}}
                {{--        cache: false,--}}
                {{--        beforeSend: function(){--}}
                {{--            $('#submit').prop('disabled',true).html('<i class="fas fa-plus"></i> Adding...');--}}
                {{--        },--}}
                {{--        success: function(msg){--}}
                {{--            if(msg.error){--}}
                {{--                $.each(msg.error, function(key, value){--}}
                {{--                    $('#catNameErrMsg').remove();--}}
                {{--                    $('#categoryName').append('<small id="catNameErrMsg" class="text-danger font-weight-bold">'+value+'</small>');--}}
                {{--                });--}}

                {{--                $('#submit').prop('disabled',false).html('<i class="fas fa-plus"></i> Add New Category');--}}
                {{--            }else{--}}
                {{--                // alert(msg.success);--}}
                {{--                // $('#submit').prop('disabled',false).html('<i class="fas fa-plus"></i> Add New Category');--}}
                {{--                // $('#categoryForm')[0].reset();--}}
                {{--                // $('#tbl_categories').load(location.href+' #tbl_categories');--}}
                {{--            }--}}
                {{--        },--}}
                {{--    })--}}
                {{--});--}}
            });
        </script>
    @endpush

</x-app-layout>