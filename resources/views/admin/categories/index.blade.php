@extends('layouts.app')

@section('content')

	<div class="card">
		<div class="card-header">
			Categories
		</div>
		<table class="table table-hover">
			<thead>
					<th>Category Name</th>
					<th>Edit</th>
					<th>Delete</th>
			</thead>
			<div class="card-block">
				<tbody>

					@if($categories->count() > 0)
						@foreach($categories as $category)
							<tr>
								<td>
									{{ $category->name }}
								</td>
								<td>
									<a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-xs btn-info">Edit</a>
								</td>
								<td>
									<a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-xs btn-danger">Delete</a>
								</td>
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
