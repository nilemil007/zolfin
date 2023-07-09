<x-app-layout>
    <!-- Site Title -->
    <x-slot:title>All Roles</x-slot:title>

    <x-slot:content-header>
        <!-- Title -->
        <div class="col-sm-6">
            <h1 class="m-0">All Roles</h1>
        </div>
    </x-slot:content-header>

    <div class="mb-3 d-flex justify-content-end">
        <a href="{{ route('admin.role.create') }}" class="btn btn-sm btn-primary m-0">
            Add new role
        </a>
    </div>

    <div class="table-responsive">
        <table id="tbl_role" class="table table-sm table-striped table-hover table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $sl => $role)
            <tr>
                <th scope="row">{{ ++$sl }}</th>
                <td>{{ $role->name }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <!-- Edit button -->
                        <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                        <!-- Delete button -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delRole{{ $role->id }}"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </td>
                <!-- Modal -->
                <div class="modal fade" id="delRole{{ $role->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Role</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure to delete this role?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('role_{{ $role->id }}').submit()">Yes, delete</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete category form -->
                <form id="role_{{ $role->id }}" action="{{ route('admin.role.destroy', $role->id) }}" method="post" hidden="hidden">
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
                new DataTable('#tbl_role', {
                    ordering: false,
                });
            });
        </script>
    @endpush

</x-app-layout>