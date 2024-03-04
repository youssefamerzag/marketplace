@extends('layouts.app')

@section('content')
<div class="container">
        <form class="card-body"  action="{{route('profile.profileUpdate', $user->id)}}" method="post">
            @csrf
            @method('put')
            <div class="m-3">
                Name :
                <input class="form-control" type="text" name="profile-name">
                @error('profile-name')
                    Add email
                @enderror
            </div>
            <div class="m-3">
                Email :
                <input class="form-control" type="email" name="profile-email">
                @error('profile-email')
                    Add email
                @enderror
            </div>
            <div class="m-3">
                Password :
                <input class="form-control" type="password" name="profile-password">
                @error('profile-password')
                    Add Password
                @enderror
            </div>
            <input class="btn bg-success text-white ms-3" type="submit" value="Update">
        </form>
</div>
@endsection