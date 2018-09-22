@extends('layouts.app')

@section('content')

	<div class="card">
		<div class="card-header">
			Tags
			<div class="text-right">
				<a href="{{ route('tag.create') }}">Create</a>
			</div>
		</div>
		<table class="table table-hover">
			<thead>
					<th>Tag Name</th>
					<th>Edit</th>
					<th>Delete</th>
			</thead>
			<div class="card-block">
				<tbody>

					@if($tags->count() > 0)
						@foreach($tags as $tag)
							<tr>
								<td>
									{{ $tag->tag }}
								</td>
								<td>
									<a href="{{ route('tag.edit', ['id' => $tag->id]) }}" class="btn btn-xs btn-info">Edit</a>
								</td>
								<td> 
									<a href="{{ route('tag.delete', ['id' => $tag->id]) }}" class="btn btn-xs btn-danger">Delete</a>
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td class="text-center" colspan=5>No tags yet!.</td>
						</tr>
					@endif

				</tbody>
			</div>
		</table>		
	</div>

@endsection
