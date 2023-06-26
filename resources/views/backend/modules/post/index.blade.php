<x-app-layout>
    <!-- Site Title -->
    <x-slot:title>All Posts</x-slot:title>

    <x-slot:content-header>
        <!-- Title -->
        <div class="col-sm-6">
            <h1 class="m-0">All Posts</h1>
        </div>
    </x-slot:content-header>

    <div class="mb-3 d-flex justify-content-end">
        <a href="{{ route('admin.post.create') }}" class="btn btn-sm btn-primary m-0">
            <i class="fas fa-plus"></i> Add new post
        </a>
    </div>

    <table id="tbl_posts" class="table table-sm table-striped table-hover table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Thumbnail</th>
            <th scope="col">User</th>
            <th scope="col">Category</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Tags</th>
            <th scope="col">Views</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($posts as $sl => $post)
            <tr>
                <th scope="row">{{ ++$sl }}</th>
                <td>
{{--                    {{ dd($post->thumbnail) }}--}}
                    <img src="{{ $post->thumbnail }}" alt="post thumbnail" width="60">
                </td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ \Illuminate\Support\Str::limit($post->content, 100) }}</td>
                <td>{{ $post->tags }}</td>
                <td>{{ $post->views }}</td>
                <td>{{ $post->status }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <!-- Edit button -->
                        <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                        <!-- Delete button -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delCategory{{ $post->id }}"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </td>
                <!-- Modal -->
                <div class="modal fade" id="delCategory{{ $post->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure to delete <strong>{{ $post->name }}</strong> category?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('cat_delete{{ $post->id }}').submit()">Yes, delete</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete category form -->
                <form id="cat_delete{{ $post->id }}" action="{{ route('admin.post.destroy', $post->id) }}" method="POST" hidden="hidden">
                    @csrf
                    @method('DELETE')
                </form>
            </tr>
        @empty
            <tr>
                <td>No posts found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#tbl_posts').DataTable();
            });
        </script>
    @endpush

</x-app-layout>