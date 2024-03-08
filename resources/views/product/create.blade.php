@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Add New Product</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="product-title" class="form-label">Title:</label>
                    <input id="product-title" class="form-control" type="text" name="product-title">
                    @error('product-title')
                        <div class="text-danger">Please provide a title.</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="product-price" class="form-label">Price:</label>
                    <input id="product-price" class="form-control" type="text" name="product-price">
                    @error('product-price')
                        <div class="text-danger">Please provide a valid price.</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="product-address" class="form-label">Address:</label>
                    <input id="product-address" class="form-control" type="text" name="product-address">
                    @error('product-address')
                        <div class="text-danger">Please provide an address.</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category:</label>
                    <select id="category" class="form-select" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="product-image" class="form-label">Image:</label>
                    <input id="product-image" class="form-control" type="file" name="product-image">
                    @error('product-image')
                        <div class="text-danger">Please upload an image.</div>
                    @enderror
                </div>
                <div class="text-end">
                    <button class="btn btn-success" type="submit">Create Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
