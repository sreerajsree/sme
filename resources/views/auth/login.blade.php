@extends('layouts.frontend')

@section('title', 'Sign in - SME Business Review™')

@section('content')

    <div class="global-container">
        <div class="card login-form">
            <div class="card-body">
                <h3 class="card-title text-center">Sign in</h3>
                <div class="card-text">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                id="email" placeholder="Email" autocomplete="email" required>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" style="float:right;font-size:12px;">
                                    Forgot your password?
                                </a>
                            @endif
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" autocomplete="current-password" required>
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark btn-block">Sign in</button>

                        {{-- <div class="sign-up">
                            Don't have an account? <a href="{{ route('register') }}">Create One</a>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
