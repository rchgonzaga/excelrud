@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="page-header">
            @unless(empty($product->id))
                <a class="pull-right btn btn-default btn-sm"
                   href="{{ route('import.show', ['id' => $product->import_id]) }}">
                    <i class="fa fa-cloud-upload"></i> Import
                </a>
            @endunless
            <h3><i class="fa fa-cube"></i> {{$product->name}}</h3>
        </header>

        <form method="POST" action="{{ route('product.update', ['id' => $product->id]) }}">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="lm" class="control-label">LM</label>
                <input id="lm" type="text" name="lm" value="{{ $product->lm }}" class="form-control" placeholder="LM"
                       autofocus>
            </div>

            <div class="form-group">
                <label for="name" class="control-label">Name*</label>
                <input id="name" type="text" name="name" value="{{ $product->name }}" class="form-control"
                       placeholder="Name" required>
            </div>

            <div class="form-group">
                <label for="category" class="control-label">Category*</label>
                <input id="category" type="text" name="category" value="{{ $product->category }}" class="form-control"
                       placeholder="Category" required>
            </div>

            <div class="form-group">
                <label for="free_shipping" class="control-label">Free Shipping</label>
                <div class="checkbox">
                    <label>
                        <input id="free_shipping" type="checkbox" name="free_shipping"
                               value="1" {{ $product->free_shipping ? 'checked' : '' }}> Free Shipping
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="control-label">Description</label>
                <input id="description" type="text" name="description" value="{{ $product->description }}"
                       class="form-control" placeholder="Description">
            </div>

            <div class="form-group">
                <label for="price" class="control-label">Price*</label>
                <input id="price" type="number" step=".01" name="price" value="{{ $product->price }}"
                       class="form-control" placeholder="Price" required>
            </div>

            <footer class="pull-left">
                <button class="btn btn-success">
                    <i class="fa fa-check"></i> Update
                </button>
            </footer>
        </form>

        <form action="{{ route('product.destroy', ['id' => $product->id]) }}" method="POST"
              onsubmit="return confirm('Are you sure you want to delete {{$product->id}}?}')"
              class="text-right">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}

            <button class="btn btn-danger">
                <i class="fa fa-remove"></i> Delete
            </button>
        </form>
    </div>
@endsection