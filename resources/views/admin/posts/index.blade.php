@extends('layouts.app')

@section('content')

	<div class="card">
		<div class="card-header">
			<table class="table table-hover">
				<thead>
						<th>Image</th>
						<th>Title</th>
						<th>Edit</th>
						<th>Delete</th>
				</thead>
				<div class="card-block">
					<tbody>

					@foreach($posts as $post)
						<tr>
							<td>Image</td>
							<td> {{ $post->title }} </td>
							<td>Edit</td>
							<td>Delete</td>
						</tr>
					@endforeach

					</tbody>
				</div>
			</table>		
		</div>
	</div>

@endsection
