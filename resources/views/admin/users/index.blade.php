@extends('layouts.app')

@section('content')

	<div class="card">
		<div class="card-header">
			Users
		</div>
		<table class="table table-hover">
			<thead>
					<th>Image</th>
					<th>Name</th>
					<th>Permissions</th>
					<th>Trash</th>
			</thead>
			<div class="card-block">
				<tbody>

				@if($users->count() > 0)
					@foreach($users as $user)
						<tr>
							<td>
								<img src="{{ asset($user->profile->avatar) }}" width="60px" height="60px" style="border-radius: 50%;" alt="">
							</td>
							<td>
								{{ $user->name }}
							</td>
							<td>
								@if( $user->admin )
									<a href="{{ route('user.not.admin', ['id' => $user->id]) }}" class="btn btn-danger">Remove Admin</a>
								@else
									<a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-success">Make Admin</a>
								@endif
							</td>
							<td>
								Trash
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td class="text-center" colspan=5>No Users yet.</td>
					</tr>
				@endif

				</tbody>
			</div>
		</table>
	</div>

@endsection
