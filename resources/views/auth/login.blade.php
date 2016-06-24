@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="page-header">
            <h3>Login</h3>
        </header>

        <form method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="email" class="control-label">
                    <i class="fa fa-at"></i> E-Mail
                </label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                       placeholder="Email" autofocus>
            </div>

            <div class="form-group">
                <label for="password" class="control-label">
                    <i class="fa fa-key"></i> Password
                </label>
                <input id="password" type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
            </div>

            <footer class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-sign-in"></i> Login
                </button>

                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
            </footer>
        </form>
    </div>
@endsection
