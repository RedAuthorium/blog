@extends('layouts.app')

@section('content')

	<div class="card">
		<div class="card-header">
			<table class="table table-hover">
				<thead>
						<th>Category Name</th>
						<th>Edit</th>
						<th>Delete</th>
				</thead>
				<div class="card-block">
					<tbody>

					@foreach($categories as $category)
						<tr>
							<td>
								{{ $category->name }}
							</td>
							<td>
								<a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-xs btn-info">Update</a>
							</td>
							<td>
								<a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-xs btn-danger">Delete</a>
							</td>
						</tr>
					@endforeach

					</tbody>
				</div>
			</table>		
		</div>
	</div>

@endsection
