@extends('layouts.form')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="login-box">
                    <div class="left">
                        <div class="card">
                            <div class="card-header"><h1>Register</h1></div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                   placeholder="Name"
                                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                                   value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input id="username" type="text"
                                                   placeholder="Username"
                                                   class="form-control @error('username') is-invalid @enderror" name="username"
                                                   value="{{ old('username') }}" required autocomplete="username" autofocus>

                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   placeholder="E-Mail Address"
                                                   name="email" value="{{ old('email') }}" required
                                                   autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                   placeholder="Password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                   placeholder="Confirm Password"
                                                   name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6" id="userrole">
                                            <label for="role"><input type="radio" id="role" name="role" value="regular" checked>Regular</label>
                                            <label for="role" style="padding-left: 15px;"><input type="radio" id="role" name="role" value="organizer">Organizer</label>
                                        </div>
                                    </div>

                                    <div class="or">OR</div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="vertical-center">
                            <a href="/login/google"><button class="social-signin google">Log in with Google+</button></a>
                            <a href="/login/github"><button class="social-signin github">Log in with GitHub</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
