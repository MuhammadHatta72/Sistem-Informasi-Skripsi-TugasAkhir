@extends('layouts.custom')

@section('title', 'Reset Password')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
                <img src="{{ asset('assets/img/logo_polinema.png') }}" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
                <div class="card-header"><h4>Reset Password</h4></div>

                <div class="card-body">
                    <p class="text-muted">We will send a link to reset your password</p>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="text" name="token" id="token" value="{{ $request->token }}" hidden>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control
                            @error('email')
                            is-invalid
                            @enderror" value="{{ $request->email }}" name="email" tabindex="1" required readonly>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input id="password" type="password" class="form-control
                            @error('password')
                            is-invalid
                            @enderror" name="password" tabindex="2" required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input id="password_confirmation" type="password" class="form-control
                            @error('password_confirmation')
                            is-invalid
                            @enderror" name="password_confirmation" tabindex="2" required>
                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="simple-footer">
                Copyright &copy; 2023
                <div class="bullet"></div>
                Developed By <a href="">Akuntansi Polinema</a>
            </div>
        </div>
    </div>
@endsection
