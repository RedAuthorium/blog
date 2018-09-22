@extends('layouts.app')

@section('content')

	<div class="card">
		<div class="card-header">
			Posts
		</div>
		<table class="table table-hover">
			<thead>
					<th>Image</th>
					<th>Title</th>
					<th>Edit</th>
					<th>Trash</th>
			</thead>
			<div class="card-block">
				<tbody>

				@if($posts->count() > 0)
					@foreach($posts as $post)
						<tr>
							<td><img src="{{ $post->featured }}" width="90px" height="50px"></td>
							<td> {{ $post->title }} </td>
							<td><a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-info">Edit</a></td>
							<td><a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-danger">Trash</a></td>
						</tr>
					@endforeach
				@else
					<tr>
						<td class="text-center" colspan=5>No posts have been published yet.</td>
					</tr>
				@endif

				</tbody>
			</div>
		</table>
	</div>

@endsection
