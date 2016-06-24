@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="page-header">
            <h3><i class="fa fa-cloud-upload"></i> Imports</h3>
        </header>

        <table class="table table-responsive table-striped table-hover">
            <thead>
            <th>Filename</th>
            <th>Extension</th>
            <th>Status</th>
            <th>Date</th>
            </thead>

            <tbody>
            @forelse ($imports as $import)
                <tr class="import" data-href="{{ route('import.show', ['id' => $import->id]) }}">
                    <td>{{ $import->filename }}</td>
                    <td>{{ $import->extension }}</td>
                    <td class="import__status import__status--{{$import->statusName()}}">
                        {{ $import->statusName() }}
                    </td>
                    <td>{{ $import->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center text-muted">
                        You still don't have any imports
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <footer class="form-group">
            <a href="{{ route('import.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                Import Sheet
            </a>
        </footer>
    </div>
@endsection