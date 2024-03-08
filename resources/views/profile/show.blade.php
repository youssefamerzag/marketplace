@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-3">
                <div class="card-body">
                    <h1 class="card-title display-4">{{ $user->name }}</h1>
                    <p class="card-text text-muted">Email: {{ $user->email }}</p>
                    <p class="card-text text-muted">Phone: {{ $user->phone }}</p>
                    <hr>
                    <div class="d-grid gap-2">
                        <a href="{{ route('profile.profileEdit', $user->id) }}" class="btn btn-success">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    
    
    <h1 class="text-center m-4">Products</h1>

    @if(Auth::check())
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="text-center">
                <a href="{{ route('products.create') }}" class="btn bg-success text-white ms-3">Create New Product</a>
            </div>
        </div>
    </div>
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