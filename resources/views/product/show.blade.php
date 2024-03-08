@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card ">
        <div class="row align-items-start ">
            <div class="col-md-6">
                <img src="{{ asset('images/' . $product->image) }}" class="img-fluid" alt="{{ $product->title }}">
            </div>
            <div class="col-md-6 mt-4">
                <div class="card-body">
                    <h1 class="card-title">{{ $product->title }}</h1>
                    <p class="card-text text-success h4"> ${{ $product->price }}</p>
                    <p class="card-text">By: {{ $product->user->name }}</p>
                    <p class="card-text">Category: {{ $product->category->name }}</p>
                    <p class="card-text">Address: {{ $product->address }}</p>
                    <div class="contact-info mt-4">
                        <h4 class="bg-success text-white rounded p-2">
                            <img src="https://img.icons8.com/ios-glyphs/90/FFFFFF/phone--v1.png" alt="phone" width="30" height="30" class="float-start me-2" />
                            {{ $product->user->phone }}
                        </h4>
                        <h4 class="bg-danger text-white rounded p-2 mt-2">
                            <img src="https://img.icons8.com/ios-glyphs/90/FFFFFF/new-post.png" alt="email" width="30" height="30" class="float-start me-2" />
                            {{ $product->user->email }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
