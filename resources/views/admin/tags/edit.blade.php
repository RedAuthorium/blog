@extends('layouts.app')

@section('content')

@include('admin.includes.__alert')


<div class="card">
    <div class="card-header">
        Edit Tag : {{ $tag->tag }}
    </div>

    <div class="card-body">
        <form action="{{ route('tag.update', ['id' => $tag->id]) }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="tag">Tag Name</label>
                <input type="text" name="tag" class="form-control" value="{{ $tag->tag }}">
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Update Tag!
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection