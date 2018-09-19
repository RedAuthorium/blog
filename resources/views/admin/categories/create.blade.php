@extends('layouts.app')

@section('content')

@if(count($errors) > 0)

    @foreach($errors->all() as $error)
        <li class="text-danger">
            {{ $error }}
        </li>
    @endforeach

@endif

<div class="card">
    <div class="card-header">
        Create New Post!
    </div>

    <div class="card-body">
        <form action="{{ route('category.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Make Category
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection