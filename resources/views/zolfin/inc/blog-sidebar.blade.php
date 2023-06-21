<div class="col-lg-4">
    <aside>
        <div class="widget">
            <form action="#" class="newsletter border t-pt-5 t-pb-5 t-pl-15 t-pr-10">
                <input type="text" placeholder="search here" class="w-100 newsletter__input"/>
                <button class="newsletter__button bttn bttn-round bttn-alpha bttn-sm text-uppercase border-0">
                    search
                </button>
            </form>
        </div>
        <div class="widget widget--bg t-bg-light-2 t-mt-50">
            <h4 class="mt-0 text-capitalize widget-title">
                recent post
            </h4>

            <ul class="t-list recent-post">
                @forelse($recentPost->take(4) as $post)
                    <li class="recent-post__list">
                        <div class="recent-post__post row no-gutters">
                            <div class="recent-post__img col-4">
                                <a href="{{ route('single.blog', $post->id) }}" class="t-link w-100">
                                    <img src="{{ $post->thumbnail }}" alt="zolfin" class="img-fluid recent-post__img-is w-100">
                                </a>
                            </div>
                            <div class="recent-post__content col-8">
                                <a href="{{ route('single.blog', $post->id) }}" class="recent-post__title t-link t-link--alpha">
                                    {{ $post->title }}
                                </a>
                            </div>
                        </div>
                    </li>
                @empty
                @endforelse
            </ul>
        </div>
        <div class="widget widget--bg t-bg-light-2 t-mt-50">
            <h4 class="mt-0 text-capitalize widget-title">
                tags
            </h4>
            <ul class="t-list d-flex flex-wrap">
                <li class="t-mr-8 t-mb-10">
                    <a href="#" class="t-link zol-pagination__card xsm-text">
                        App
                    </a>
                </li>
                <li class="t-mr-8 t-mb-10">
                    <a href="#" class="t-link zol-pagination__card xsm-text">
                        Agencyco
                    </a>
                </li>
                <li class="t-mr-8 t-mb-10">
                    <a href="#" class="t-link zol-pagination__card xsm-text">
                        History
                    </a>
                </li>
                <li class="t-mr-8 t-mb-10">
                    <a href="#" class="t-link zol-pagination__card xsm-text">
                        Blue Glod
                    </a>
                </li>
                <li class="t-mr-8 t-mb-10">
                    <a href="#" class="t-link zol-pagination__card xsm-text">
                        Interest
                    </a>
                </li>
                <li class="t-mr-8 t-mb-10">
                    <a href="#" class="t-link zol-pagination__card xsm-text">
                        Melbourne
                    </a>
                </li>
                <li class="t-mr-8 t-mb-10">
                    <a href="#" class="t-link zol-pagination__card xsm-text">
                        Optimize
                    </a>
                </li>
                <li class="t-mr-8 t-mb-10">
                    <a href="#" class="t-link zol-pagination__card xsm-text">
                        Darwin
                    </a>
                </li>
                <li class="t-mr-8 t-mb-10">
                    <a href="#" class="t-link zol-pagination__card xsm-text">
                        Perth
                    </a>
                </li>
            </ul>
        </div>
        <div class="widget widget--bg t-bg-light-2 t-mt-50">
            <h4 class="mt-0 text-capitalize widget-title text-center">
                Get Subscribed
            </h4>
            <p class="text-center">
                Subscribe to get the latest news. No spam, we promise.
            </p>
            <form action="#" class="newsletter border t-pt-5 t-pb-5 t-pl-15 t-pr-10">
                <input type="text" placeholder="your email" class="w-100 newsletter__input">
                <button class="newsletter__button bttn bttn-round bttn-alpha bttn-sm text-uppercase border-0">
                    join now
                </button>
            </form>
        </div>
    </aside>
</div>
