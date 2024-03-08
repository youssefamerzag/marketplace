@extends('layouts.app')

@section('content')
<div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <form class="d-flex" action="{{ route('products.search') }}" method="get">
                <input class="form-control me-1 rounded-start" name='search-value' type="text" placeholder="Search">
                <button class="btn btn-success rounded-end px-4" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>

<div class="d-flex flex-column">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    @foreach($categories as $category)
                    <li class="nav-item me-4">
                        <a class="nav-link" href="{{ route('product-category', $category->id) }}">{{ $category->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    <div class="collapse d-flex mx-2 mt-4 bg-gr" id="navbarNav">
        <a class="btn btn-sm btn-outline-secondary text-start me-2" href="{{ route('products-sortby')}}">Sort by Lowest First</a>
        <a class="btn btn-sm btn-outline-secondary text-start" href="{{ route('products-sortbydesc')}}">Sort by Highest First</a>
    </div>

    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach($products as $product)
            <div class="col">
                <div class="card h-100 shadow">
                    <img src="images/{{ $product->image }}" class="card-img-top" alt="Product Image" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text text-success">$ {{ $product->price }}</p>
                        <p class="card-text">By: {{ $product->user->name }}</p>
                        <p class="card-text">Address: {{ $product->address }}</p>
                        <div class="d-grid">
                            <a class="btn btn-success text-white" href="{{ route('products.show', $product->id) }}">Show</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
