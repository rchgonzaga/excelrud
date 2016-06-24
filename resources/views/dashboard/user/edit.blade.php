@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="page-header">
            <h3><i class="fa fa-user"></i> Profile</h3>
        </header>

        <form method="POST" action="{{ route('user.update', ['id' => $user->id]) }}">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name" class="control-label">Name*</label>
                <input id="name" type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name"
                       autofocus required>
            </div>

            <footer>
                <button class="btn btn-success">
                    <i class="fa fa-check"></i> Update
                </button>
            </footer>
        </form>
    </div>
@endsection