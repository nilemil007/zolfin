<x-app-layout>
    <!-- Site Title -->
    <x-slot:title>All Permissions</x-slot:title>

    <x-slot:content-header>
        <!-- Title -->
        <div class="col-sm-6">
            <h1 class="m-0">All Permissions</h1>
        </div>
    </x-slot:content-header>

    <div class="mb-3 d-flex justify-content-end">
        <a href="{{ route('admin.permission.create') }}" class="btn btn-sm btn-primary m-0">
            Add new permission
        </a>
    </div>

    <div class="table-responsive">
        <table id="tbl_permission" class="table table-sm table-striped table-hover table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Group Name</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions as $sl => $permission)
                <tr>
                    <th scope="row">{{ ++$sl }}</th>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->group_name }}</td>
                    <td>
                        <!-- Edit button -->
                        <a href="{{ route('admin.permission.edit', $permission->id) }}" class="text-primary">Edit</a>

                        <span> | </span>

                        <!-- Delete button -->
                        <a href="javascript.void(0)" class="text-danger" data-toggle="modal" data-target="#delPermission{{ $permission->id }}">Delete</a>
                    </td>
                    <!-- Modal -->
                    <div class="modal fade" id="delPermission{{ $permission->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Permission</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure to delete this permission?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('permission_{{ $permission->id }}').submit()">Yes, delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete category form -->
                    <form id="permission_{{ $permission->id }}" action="{{ route('admin.permission.destroy', $permission->id) }}" method="post" hidden="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {
                new DataTable('#tbl_permission', {
                    ordering: false,
                });
            });
        </script>
    @endpush

</x-app-layout>