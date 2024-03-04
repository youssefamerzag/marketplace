@extends('layouts.app')


@section('content')
<div class="container">
    <form class="card-body" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="m-3">
            title :
            <input class="form-control" type="text" name="product-title">
            @error('product-title')
                Add title
            @enderror
        </div>
        <div class="m-3">
            Price :
            <input class="form-control" type="text" name="product-price">
            @error('product-price')
                Add price
            @enderror
        </div>
        <div class="m-3">
            image :
            <input class="form-control" type="file" name="product-image">
            @error('product-image')
                Add image
            @enderror
        </div>
        <input class="btn bg-success text-white ms-3" type="submit" value="create">
    </form>
</div>
@endsection