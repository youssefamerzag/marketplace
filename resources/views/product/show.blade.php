@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="row align-items-start">
                <div class="col">
                    <img src="{{ asset('images/' . $product->image) }}" width="500" alt="{{ $product->title }}">
                </div>
                <div class="col-6 mt-4">
                    <div class="card-body">
                        <p class="card-title h1">{{ $product->title }}</p>
                        <p class="card-text text-success h4"> ${{ $product->price }}</p>
                        <p class="card-text">By: {{ $product->user->name }}</p>
                        <p class="card-text">Category: {{ $product->category->name }}</p>
                        <p class="card-text">Address: {{ $product->address }}</p>
                        <h4 class="p-2 bg-success text-white rounded text-center">
                            <img src="https://img.icons8.com/ios-glyphs/90/FFFFFF/phone--v1.png" alt="phone--v1" width="30" height="30" style="float: left; margin-right: 10px;"/>
                            {{$product->user->phone}}
                        </h4>
                        <h4 class="p-2 bg-danger text-white rounded text-center">
                            <img src="https://img.icons8.com/ios-glyphs/90/FFFFFF/new-post.png" alt="new-post" width="30" height="30" style="float: left; margin-right: 10px;"/>
                            {{$product->user->email}}
                        </h4>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
