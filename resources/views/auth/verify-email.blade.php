<x-guest-layout>
    <x-slot:title>Verify Email</x-slot:title>

    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('home') }}" class="h1">{{ config('app.name') }}</a>
            </div>
            <div class="card-body">
                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 text-success">
                        {{ __('Verification link has been sent.') }}
                    </div>
                @else
                    <p>{{ __('Before getting started, you must verify your email address. If you didn\'t receive the email, we will gladly send you another.') }}</p>
                @endif

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button class="btn btn-info">
                        {{ __('Resend Verification Email') }}
                    </button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</x-guest-layout>
