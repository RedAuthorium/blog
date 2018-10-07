@extends('layouts.app')

@section('content')

@include('admin.includes.__alert')

<div class="card">
    <div class="card-header">
        Create New Post!
    </div>

    <div class="card-body">
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="featured">Featured Image</label>
                <input type="file" name="featured" class="form-control">
            </div>

            <div class="form-group">
                <label for="category">Select a category</label>
                <select name="category_id" id="category" class="form-control">

                    @foreach($categories as $category)
                        <option value="{{$category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for="tag">Select tag</label>

                @foreach ($tags as $tag)
                    <div class="checkbox">
                        <input type="checkbox" name="tags[]" value="{{$tag->id}}">{{ $tag->tag }}
                    </div>
                @endforeach

            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="summernote" cols="5" rows="5" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection