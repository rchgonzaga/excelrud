@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="page-header">
            <h3><i class="fa fa-plus"></i> Import</h3>
        </header>

        <form method="POST" action="{{ route('import.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label class="control-label">File</label>
                <input id="file" type="file" name="file" class="form-control" autofocus
                       accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
            </div>

            <footer class="form-group">
                <button class="btn btn-success">
                    <i class="fa fa-check"></i> Import
                </button>
            </footer>
        </form>
    </div>
@endsection