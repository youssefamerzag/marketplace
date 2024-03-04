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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
