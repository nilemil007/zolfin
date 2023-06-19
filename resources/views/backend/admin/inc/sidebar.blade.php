<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('zolfin/assets/img/logo.png') }}" alt="Dashboard Logo" class="brand-image">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Categories -->
                <li class="nav-item {{ request()->routeIs('admin.category.index') ? 'menu-open' :
                (request()->routeIs('admin.category.create') ? 'menu-open' : (request()->routeIs('admin.category.edit') ? 'menu-open' : '')) }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.category.index') ? 'active' :
                    (request()->routeIs('admin.category.create') ? 'active' :
                    (request()->routeIs('admin.category.edit') ? 'active' : '')) }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.category.create') }}"
                            class="nav-link {{ request()->routeIs('admin.category.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add new</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.category.index') }}" class="nav-link {{ request()->routeIs('admin.category.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Posts -->
                <li class="nav-item {{ request()->routeIs('admin.post.index') ? 'menu-open' :
                (request()->routeIs('admin.post.create') ? 'menu-open' : (request()->routeIs('admin.post.edit') ? 'menu-open' : '')) }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.post.index') ? 'active' :
                    (request()->routeIs('admin.post.create') ? 'active' :
                    (request()->routeIs('admin.post.edit') ? 'active' : '')) }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Posts
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.post.create') }}"
                               class="nav-link {{ request()->routeIs('admin.post.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add new</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.post.index') }}" class="nav-link {{ request()->routeIs('admin.post.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All posts</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">EXAMPLES</li>

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a class="nav-link bg-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="nav-icon fas fa-book"></i>
                            <p>{{ __('Log Out') }}</p>
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
