<x-main-layout>
    <!-- Banner  -->
    <div class="zol-banner zol-banner--404 t-pt-150 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2 class="mt-0 t-text-light text-capitalize">
                        Login
                    </h2>
                    <ul class="t-list breadcrumbs d-flex justify-content-center align-items-center">
                        <li class="breadcrumbs__list">
                            <a href="{{ route('home') }}" class="t-link breadcrumbs__link t-link--light-alpha text-capitalize">
                                home
                            </a>
                        </li>
                        <li class="breadcrumbs__list">
                            <a href="#" class="t-link breadcrumbs__link t-link--light-alpha text-capitalize">
                                login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-5 mb-5">
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf

                            <!-- Login -->
                            <div class="mb-3">
                                <label for="login" class="form-label">Username/Email/Phone</label>
                                <input type="text" name="login" value="{{ old('login') }}" class="form-control @error('login') is-invalid @enderror" id="login" placeholder="Enter Username, Email or Phone">
                                @error('login') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter password">
                                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <!-- Remember -->
                            <div class="form-check">
                                <input name="remember" class="form-check-input" type="checkbox" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember me
                                </label>
                            </div>

                            <button class="btn btn-primary mt-3">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
