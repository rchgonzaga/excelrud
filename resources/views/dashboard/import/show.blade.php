@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="page-header">
            <h3><i class="fa fa-cloud-upload"></i> Import Details</h3>
        </header>

        <table class="table" style="width: auto;">
            <tr>
                <td><b>Filename:</b></td>
                <td>{{$import->filename}}</td>
            </tr>

            <tr>
                <td><b>Extension:</b></td>
                <td>{{$import->extension}}</td>
            </tr>

            <tr>
                <td><b>Size:</b></td>
                <td>{{$import->size}} bytes</td>
            </tr>

            <tr>
                <td><b>Status:</b></td>
                <td>
                    <span class="import__status import__status--{{$import->statusName()}}">{{$import->statusName()}}</span>
                    <small class="text-muted">({{$import->updated_at}})</small>
                </td>
            </tr>

            <tr>
                <td><b>Date</b></td>
                <td>{{$import->created_at}}</td>
            </tr>
        </table>

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
                        No product has been imported from this file
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection