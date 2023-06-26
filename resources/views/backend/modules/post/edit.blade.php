<x-app-layout>
    <!-- Site Title -->
    <x-slot:title>Edit Post</x-slot:title>

    <x-slot:content-header>
        <!-- Title -->
        <div class="col-sm-6">
            <h1 class="m-0">Edit Post</h1>
        </div>
    </x-slot:content-header>

    @if($errors->any())
        {!! Toastr::error(implode('', $errors->all('<div>:message</div>')), 'Error') !!}
    @endif


    <form class="row g-3" action="{{ route('admin.post.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="col-md-9">
            <!-- Name -->
            <div class="input-group mb-3">
                <input id="postTitle" name="title" type="text" value="{{ old('title', $post->title) }}" class="form-control" placeholder="Enter post title" autofocus>
            </div>

            <!-- Content -->
            <div class="mb-3">
                <textarea name="content">{{ old('content', $post->content) }}</textarea>
            </div>
        </div>

        <div class="col-md-3">
            <!-- Publish -->
            <div class="card">
                <div class="card-header" style="font-weight: bold;">
                    Publish
                </div>
                <div class="card-body">
                    <div class="form-check">
                        <input name="status" class="form-check-input" type="radio" value="publish" id="publish" {{ $post->status == 'publish' ? 'checked' : '' }}>
                        <label class="form-check-label" for="publish">
                            Publish
                        </label>
                    </div>

                    <div class="form-check">
                        <input name="status" class="form-check-input" type="radio" value="draft" id="draft" {{ $post->status == 'draft' ? 'checked' : '' }}>
                        <label class="form-check-label" for="draft">
                            Draft
                        </label>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-info">Update & Publish</button>
                </div>
            </div>

            <!-- Category -->
            <div class="card">
                <div class="card-header" style="font-weight: bold;">
                    Categories
                </div>
                <div class="card-body overflow-auto" style="max-height: 230px;">
                    @forelse($categories as $category)
                        <div class="form-check">
                            <input name="category_id" class="form-check-input" type="checkbox" value="{{ $category->id }}" id="category_checkbox_{{ $category->id }}" {{ $post->category->id == $category->id ? 'checked' : '' }}>
                            <label class="form-check-label" for="category_checkbox_{{ $category->id }}">
                                {{ $category->name }}
                            </label>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>

            <!-- Tags -->
            <div class="card">
                <div class="card-header" style="font-weight: bold;">
                    Tags
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" name="tags" value="{{ $post->tags }}"/>
                </div>
            </div>

            <!-- Thumbnail -->
            <div class="card">
                <div class="card-header" style="font-weight: bold;">
                    Thumbnail
                </div>
                <div class="card-body">
                    <input name="thumbnail" type="file" accept="image/*" onchange="loadFile(event)">
                    @if(!empty($post->thumbnail))
                        <img src="{{ $post->thumbnail }}" class="mt-2" id="output" width="100%"/>
                    @else
                        <img class="mt-2" id="output" width="100%"/>
                    @endif
                </div>
            </div>
        </div>
    </form>

    @push('scripts')

        <script>

            {{--Preview post thumbnail--}}
            const loadFile = function (event) {
                const reader = new FileReader();
                reader.onload = function () {
                    const output = document.getElementById('output');
                    output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            };

            {{--Post tags--}}
            $('input[name="tags"]').amsifySuggestags();

            {{--Post editor--}}
            tinymce.init({
                selector: 'textarea', // Replace this CSS selector to match the placeholder element for TinyMCE
                plugins: 'code table lists',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
            });
        </script>
    @endpush

</x-app-layout>
