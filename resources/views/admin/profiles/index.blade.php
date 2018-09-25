@extends('layouts.app')

@section('content')

@include('admin.includes.__alert')

<div class="card">
    <div class="card-header">
        Edit your profile
    </div>

    <div class="card-body">
        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="avatar">Upload Avatar</label>
                <input type="file" name="avatar" class="form-control">
            </div>

            <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="text" name="facebook" class="form-control" value="{{ $user->profile->facebook }}">
            </div>

            <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="text" name="instagram" class="form-control" value="{{ $user->profile->instagram }}">
            </div>

           	<div class="form-group">
           		<label for="about">About</label>
           		<textarea class="form-control" rows="6">{{ $user->profile->about }}</textarea>
           	</div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection