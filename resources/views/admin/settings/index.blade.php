@extends('layouts.app')

@section('content')

@include('admin.includes.__alert')

<div class="card">
    <div class="card-header">
        Edit your site information
    </div>

    <div class="card-body">
        <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="site_name">Site name</label>
                <input type="text" name="site_name" class="form-control" value="{{ $settings->site_name }}">
            </div>

            <div class="form-group">
                <label for="email">Contact email</label>
                <input type="email" name="contact_email" class="form-control" value="{{ $settings->contact_email }}">
            </div>

            <div class="form-group">
                <label for="contact_phone">Contact phone</label>
                <input type="text" name="contact_phone" class="form-control" value="{{ $settings->contact_phone }}">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" class="form-control" value="">{{ $settings->address }}</textarea>
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