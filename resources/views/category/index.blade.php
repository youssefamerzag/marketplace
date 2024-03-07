@extends('layouts.app')

@section('content')

<div class="container mx-auto mt-4">
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3 mb-4 ">
            <div class="card shadow-sm">
                <img src="{{asset('images/'.$product->image)}}" class="card-img-top" alt="Product Image" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text text-success"> ${{ $product->price }}</p>
                    <p class="card-text">By: {{ $product->user->name }}</p>
                    <p class="card-text">Address: {{ $product->address }}</p>
                    <div class="row mx-2"> 
                        <a class="btn bg-success text-white" href="{{route('products.show', $product->id)}}">Show</a>
                    </div>
                </div> 
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection