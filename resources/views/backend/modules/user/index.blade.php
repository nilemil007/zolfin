<x-app-layout>
    <!-- Site Title -->
    <x-slot:title>All Users</x-slot:title>

    <x-slot:content-header>
        <!-- Title -->
        <div class="col-sm-6">
            <h1 class="m-0">All Users</h1>
        </div>
    </x-slot:content-header>

    <div class="mb-3 d-flex justify-content-end">
        <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-primary m-0">
            Add new user
        </a>
    </div>

    <div class="table-responsive">
        <table id="tbl_users" class="table table-sm table-striped table-hover table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Phone|Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $sl => $user)
            <tr>
                <th scope="row">{{ ++$sl }}</th>
                <td>
                    <img src="{{ asset($user->image) }}" alt="user thumbnail" width="60">
                </td>
                <td>
                    <div>
                        <p class="m-0">{{ $user->name }}</p>
                        <p class="m-0 text-gray">{{ '@'.$user->username }}</p>
                    </div>
                </td>
                <td>
                    <div>
                        <p class="m-0">{{ $user->phone }}</p>
                        <p class="m-0 text-gray">{{ $user->email }}</p>
                    </div>
                </td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->status }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <!-- Edit button -->
                        <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                        <!-- Delete button -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delUser{{ $user->id }}"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </td>
                <!-- Modal -->
                <div class="modal fade" id="delUser{{ $user->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure to delete this user?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('user_delete{{ $user->id }}').submit()">Yes, delete</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete category form -->
                <form id="user_delete{{ $user->id }}" action="{{ route('admin.user.destroy', $user->id) }}" method="user" hidden="hidden">
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
                $('#tbl_users').DataTable();
            });
        </script>
    @endpush

</x-app-layout>