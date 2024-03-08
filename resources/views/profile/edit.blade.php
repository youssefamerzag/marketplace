@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Update Profile</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('profile.profileUpdate', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="profile-name" class="form-label">Name:</label>
                    <input id="profile-name" class="form-control" type="text" name="profile-name" value="{{ $user->name }}">
                    @error('profile-name')
                        <div class="text-danger">Please provide a name.</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="profile-email" class="form-label">Email:</label>
                    <input id="profile-email" class="form-control" type="email" name="profile-email" value="{{ $user->email }}">
                    @error('profile-email')
                        <div class="text-danger">Please provide a valid email.</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="profile-password" class="form-label">Password:</label>
                    <input id="profile-password" class="form-control" type="password" name="profile-password">
                    @error('profile-password')
                        <div class="text-danger">Please provide a password.</div>
                    @enderror
                </div>
                <div class="text-end">
                    <button class="btn btn-success" type="submit">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
