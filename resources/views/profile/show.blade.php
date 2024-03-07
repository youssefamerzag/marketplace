@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="card-title">{{ $user->name }}</h1>
                        <h5 class="card-subtitle mb-3 text-muted">{{ $user->email }}</h5>
                        <h5 class="card-subtitle mb-3 text-muted">{{ $user->phone }}</h5>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('profile.profileEdit', $user->id) }}" class="btn btn-success">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <h1 class="text-center m-4">Products</h1>

    @if(Auth::check())
        <a class="btn bg-success text-white ms-3" href="{{route('products.create')}}">Create New Product</a>
    @endif
    <div class="container mt-4">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src={{ asset("images/" . $product->image) }} class="card-img-top" alt="Product Image" style="height: 200px; object-fit: cover;">
                            <div class="card-body ">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <p class="card-text text-success"> ${{ $product->price }}</p>
                                <p class="card-text">By: {{ $product->user->name }}</p>
                                <div class="d-flex justify-content-center">
                                    <form action="{{route('products.destroy', $product->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input class="btn bg-danger text-white px-3 mx-2" type="submit" value="Delete">
                                    </form>
                                    <a class="btn bg-success text-white  px-4 mx-2" href="{{route('products.edit', $product->id)}}">Edit</a>
                                <div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection