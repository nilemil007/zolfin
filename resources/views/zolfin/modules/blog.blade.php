<x-main-layout>
    <!-- Banner  -->
    <div class="zol-banner zol-banner--blog t-pt-150 t-pb-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2 class="mt-0 t-text-light">Blog & News</h2>
                    <ul class="t-list breadcrumbs d-flex justify-content-center align-items-center">
                        <li class="breadcrumbs__list">
                            <a href="#" class="t-link breadcrumbs__link t-link--light-alpha text-capitalize">
                                home
                            </a>
                        </li>
                        <li class="breadcrumbs__list">
                            <a href="#" class="t-link breadcrumbs__link t-link--light-alpha text-capitalize">
                                blog
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Blog Post  -->
    <div class="t-pt-120 t-pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Blog content -->
                <div class="col-lg-8 t-mb-50 mb-lg-0">
                    <div class="row">
                        @forelse($posts as $post)
                            <div class="col-12 t-mb-50">
                                <div class="blog-post border">
                                    <div class="blog-post__img">
                                        <a href="#" class="t-link blog-post__img-link w-100">
                                            <img src="{{ $post->thumbnail }}" alt="zolfin" class="w-100 img-fluid"/>
                                        </a>
                                        <span
                                            class="blog-post__date d-flex flex-column align-items-center justify-content-center">
                                            <span class="blog-post__date-day d-block">{{ $post->created_at->format('d') }}</span>
                                            <span class="blog-post__date-month text-capitalize d-block">{{ $post->created_at->format('F') }}</span>
                                        </span>
                                    </div>
                                    <div class="blog-post__body">
                                        <h3 class="blog-post__title">
                                            <a href="blog-details.html" class="t-link t-link--alpha blog-post__title-link">
                                                {{ $post->title }}
                                            </a>
                                        </h3>
                                        <p class="t-mt-30 t-text-heading">
{{--                                            {{ \Illuminate\Support\Str::excerpt($post->content) }}--}}
                                            {{ $post->content }}
                                        </p>
                                    </div>
                                    <div class="blog-post__footer t-pb-30 t-pt-20">
                                        <ul class="t-list d-flex align-items-center blog-post__footer flex-wrap">
                                            <li class="blog-post__footer-list t-mb-15 t-mr-15">
                                                <a href="#" class="t-link blog-post__author d-flex align-items-center">
                                                    <span class="blog-post__author-img t-mr-8">
                                                        <img
                                                            src="{{ $post->user->images }}"
                                                            alt="zolfin"
                                                            class="img-fluid"
                                                        />
                                                    </span>
                                                    <span class="blog-post__author-name text-capitalize">
                                                        {{ $post->user->name }}
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="blog-post__footer-list t-mb-15 t-mr-15">
                                                <a href="{{ route('posts.by.category', $post->category->id) }}" class="t-link t-link--alpha sm-text blog-post__footer-link text-capitalize">
                                                    <i class="las la-tags"></i>
                                                    {{ $post->category->name }}
                                                </a>
                                            </li>
                                            <li class="blog-post__footer-list t-mb-15 t-mr-15">
                                                <a href="#" class="t-link t-link--alpha sm-text blog-post__footer-link text-capitalize">
                                                    <i class="las la-calendar"></i>
                                                    {{ $post->created_at->format('d F') }}
                                                </a>
                                            </li>
                                            <li
                                                class="blog-post__footer-list t-mb-15 t-mr-15"
                                            >
                                                <a
                                                    href="#"
                                                    class="t-link t-link--alpha sm-text blog-post__footer-link text-capitalize"
                                                >
                                                    <i class="las la-clock"></i>
                                                    8 min read
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse

                        {{ $posts->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>

                <!-- Blog sidebar -->
                @include('zolfin.inc.blog-sidebar', $recentPost)
            </div>
        </div>
    </div>
    <!-- Blog Post End -->
</x-main-layout>
