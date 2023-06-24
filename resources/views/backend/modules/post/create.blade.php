<x-app-layout>
    <!-- Site Title -->
    <x-slot:title>Add New Post</x-slot:title>

    <x-slot:content-header>
        <!-- Title -->
        <div class="col-sm-6">
            <h1 class="m-0">Add New Post</h1>
        </div>
    </x-slot:content-header>

    <form class="row g-3" action="{{ route('admin.post.store') }}" method="post">
        @csrf

        <div class="col-md-9">
            <!-- Name -->
            <div class="input-group mb-3">
                <input id="postTitle" name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter post title" required autofocus>
            </div>
            <!-- Validation messages -->
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror

            <!-- Content -->
            <div class="mb-3">
                <textarea name="content"></textarea>
            </div>
        </div>

        <div class="col-md-3">
            <!-- Publish -->
            <div class="card">
                <div class="card-header">
                    Publish
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-info">Publish</button>
                </div>
            </div>

            <!-- Category -->
            <div class="card">
                <div class="card-header">
                    Categories
                </div>
                <div class="card-body overflow-auto" style="max-height: 230px;">
                    @forelse($categories as $category)
                        <div class="form-check">
                            <input name="category_checkbox" class="form-check-input" type="checkbox" value="{{ $category->id }}" id="category_checkbox_{{ $category->id }}">
                            <label class="form-check-label" for="category_checkbox_{{ $category->id }}">
                                {{ $category->name }}
                            </label>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>

            <!-- Thumbnail -->
            <div class="card">
                <div class="card-header">
                    Thumbnail
                </div>
                <div class="card-body">
                    <p>add new thumbnail...</p>
                </div>
            </div>
        </div>
    </form>


    @push('scripts')
        <script>
            tinymce.init({
                selector: 'textarea', // Replace this CSS selector to match the placeholder element for TinyMCE
                plugins: 'code table lists',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
            });
        </script>
    @endpush

</x-app-layout>
