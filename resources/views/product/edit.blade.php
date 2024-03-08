@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Edit Product</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="product-title" class="form-label">Title:</label>
                    <input id="product-title" class="form-control" type="text" name="product-title" value="{{ $product->title }}">
                    @error('product-title')
                        <div class="text-danger">Please provide a title.</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="product-price" class="form-label">Price:</label>
                    <input id="product-price" class="form-control" type="number" name="product-price" value="{{ $product->price }}">
                    @error('product-price')
                        <div class="text-danger">Please provide a valid price.</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="product-image" class="form-label">Image:</label>
                    <input id="product-image" class="form-control" type="file" name="product-image">
                    @error('product-image')
                        <div class="text-danger">Please upload an image.</div>
                    @enderror
                </div>
                <div class="text-end">
                    <button class="btn btn-success" type="submit">Update Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
