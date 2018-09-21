@extends('layouts.app')

@section('content')

	<div class="card">
		<table class="table table-hover">
			<thead>
					<th>Image</th>
					<th>Title</th>
					<th>Edit</th>
					<th>Restore</th>
					<th>Delete</th>
			</thead>
			<div class="card-block">
				<tbody>

				@foreach($posts as $post)
					<tr>
						<td><img src="{{ $post->featured }}" width="90px" height="50px"></td>
						<td> {{ $post->title }} </td>
						<td>Edit</td>
						<td><a href="{{ route('post.restore', ['id' => $post->id]) }}" class="btn btn-success">Restore</a></td>
						<td><a href="{{ route('post.remove', ['id' => $post->id]) }}" class="btn btn-danger">Remove</a></td>
					</tr>
				@endforeach

				</tbody>
			</div>
		</table>		
	
	</div>

@endsection
