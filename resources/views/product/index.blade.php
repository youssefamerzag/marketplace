@extends('layouts.app')  

@section('content',)
<div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <form class="d-flex" action="{{route('products.search')}}" method="get">
                <input class="form-control me-1 rounded-start" name='search-value' type="text" placeholder="Search">
                <button class="btn btn-success rounded-end px-4" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>

<div class="d-flex f-wrap ">
    <div class="card m-2 p-4">
        <h5 class="text-center">Categories</h5>
        <ul class="list-unstyled m-3">
            @foreach($categories as $category)
            <li class="p-2"><a class="text-decoration-none" href="{{ route('product-category', $category->id)}}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="container mx-auto mt-4">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3 mb-4 ">
                <div class="card shadow-sm">
                    <img src="images/{{ $product->image }}" class="card-img-top" alt="Product Image" style="height: 200px; object-fit: cover;">
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
</div>
@endsection