<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $products = $request->user()->products()->get();
        return view('dashboard.product.index', ['products' => $products]);
    }

    public function edit($productId)
    {
        $product = Product::find($productId);
        return view('dashboard.product.edit', ['product' => $product]);
    }

    public function update($productId, ProductUpdateRequest $request)
    {
        $product = Product::find($productId);

        $fields = ['lm', 'name', 'category', 'free_shipping', 'description', 'price'];
        foreach ($fields as $field) {
            $product->$field = $request->input($field);
        }

        $product->save();

        return redirect()->route('product.index')->with('message', 'Product updated');
    }

    public function destroy($productId)
    {
        $product = Product::find($productId);
        $product->delete();

        return redirect()->route('product.index')->with('message', 'Product deleted');
    }
}
