<header class="l-header active t-bg-light border-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-7 col-lg-3 col-xl-2">
                <div class="brand">
                    <a href="{{ route('home') }}" class="t-link">
                        <img
                            src="{{ asset('zolfin/assets/img/logo.png') }}"
                            alt="zolfin"
                            class="img-fluid w-100"
                        />
                    </a>
                </div>
            </div>
            <div class="col-5 col-lg-9 col-xl-8 text-right">
                <div class="zol-menu-wrapper">
                    <div class="zol-menu-toggle d-inline-block d-lg-none">
                        <span class="zol-menu-open">
                            <i class="las la-bars"></i>
                        </span>
                        <span class="zol-menu-close">
                            <i class="las la-times"></i>
                        </span>
                    </div>
                    <ul class="t-list zol-menu">
                        <li class="zol-menu__list {{ request()->routeIs('blog') ? 'zol-menu__current' : '' }}">
                            <a href="{{ route('blog') }}" class="t-link zol-menu__link">blog</a>
                        </li>
                        <li class="zol-menu__list">
                            <a href="#" class="t-link zol-menu__link">category</a>
                        </li>
                        @auth
                            <li class="zol-menu__list">
                                <a href="{{ auth()->user()->role == 'admin' ? route('admin.dashboard') : ( auth()->user()->role == 'author' ? route('author.dashboard') : ( auth()->user()->role == 'editor' ? route('editor.dashboard') : '' ) ) }}"
                                   class="t-link zol-menu__link">Dashboard</a>
                            </li>
                        @else
                            <li class="zol-menu__list {{ request()->routeIs('login') ? 'zol-menu__current' : '' }}">
                                <a href="{{ route('login') }}" class="t-link zol-menu__link">login</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 d-none d-xl-block">
                <a href="#" class="t-link bttn bttn-sm bttn-round bttn-primary">
                    +1 (008) 249-8596
                </a>
            </div>
        </div>
    </div>
</header>
