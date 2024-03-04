@extends('layouts.app')

@section('content')
<div class="container">
        <form class="card-body"  action="{{route('products.update', $product->id)}}" method="post"  enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="m-3">
                title :
                <input class="form-control" type="text" name="product-title" value="{{$product->title}}">
                @error('product-title')
                    Add title
                @enderror
            </div>
            <div class="m-3">
                price :
                <input class="form-control" type="number" name="product-price" value="{{$product->price}}">
                @error('product-price')
                    Add price
                @enderror
            </div>
            <div class="m-3">
                image :
                <input class="form-control" type="file" name="product-image" value="{{$product->image}}">
                @error('product-image')
                    Add image
                @enderror
            </div>
            <input class="btn bg-success text-white ms-3" type="submit" value="Update">
        </form>
</div>
@endsection