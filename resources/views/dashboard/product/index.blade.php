@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="page-header">
            <h3><i class="fa fa-cubes"></i> Products</h3>
        </header>

        <table class="table table-responsive table-striped table-hover">
            <thead>
            <th>LM</th>
            <th>Name</th>
            <th>Category</th>
            <th>Free Shipping</th>
            <th>Description</th>
            <th>Price</th>
            </thead>

            <tbody>
            @forelse ($products as $product)
                <tr class="product" data-href="{{ route('product.edit', ['id' => $product->id]) }}">
                    <td>{{ $product->lm }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category }}</td>
                    <td class="product__free_shipping">
                        <i class="fa fa-{{ $product->free_shipping ? 'check' : 'remove' }}"></i>
                    </td>
                    <td>{{ $product->description }}</td>
                    <td>R$ {{ number_format($product->price, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center text-muted">
                        No product has been imported yet
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