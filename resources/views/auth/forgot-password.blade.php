<x-guest-layout>
    <x-slot:title>Forgot Password</x-slot:title>

    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('home') }}" class="h1">{{ config('app.name') }}</a>
            </div>
            <div class="card-body">
                @if(session('status'))
                    <p class="mb-4 text-success">{{ session('status') }}</p>
                @else
                    <p class="mb-4 text-gray">{{ __('Please enter your registered email address to sent password reset link.') }}</p>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                    <div class="input-group">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email address">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror

                    <button class="btn btn-primary mt-3">{{ __('Password Reset Link') }}</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</x-guest-layout>
