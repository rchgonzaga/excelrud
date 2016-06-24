@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="page-header">
            <h3>Register</h3>
        </header>

        <form method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name" class="control-label">Name*</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                       placeholder="Name" autofocus required>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">E-Mail Address</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                       placeholder="Email">
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">Password</label>
                <input id="password" type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm" class="control-label">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                       placeholder="Password Confirmation">
            </div>

            <footer class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-check"></i> Register
                </button>
            </footer>
        </form>
    </div>
@endsection
