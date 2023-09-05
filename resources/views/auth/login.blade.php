@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center py-4">
    <main class="form-signin w-100 m-auto">
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                <label for="floatingInput">{{ __('E-Mail Address') }}</label>
            </div>
            <div class="form-floating">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <label for="floatingPassword">{{ __('Password') }}</label>
            </div>

            <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefault">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">{{ __('Login') }}</button>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif        
            <p class="mt-5 mb-3 text-body-secondary">© Hendra Darmawan 2023</p>
        </form>
    </main>
</div>
@endsection
