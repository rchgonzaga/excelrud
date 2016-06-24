@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="page-header">
            <h3>Reset Password</h3>
        </header>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="email" class="control-label">E-Mail Address</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                       placeholder="Email" autofocus>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                </button>
            </div>
        </form>
    </div>
@endsection
