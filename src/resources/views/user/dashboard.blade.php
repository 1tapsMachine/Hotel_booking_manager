@extends('user.layouts.app')

@section('title')
User Dashboard
@endsection


@section('content')
	<div class="container">
		<div class="row mt-4">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4>Welcome, {{ Auth::user()->name }}</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="card-header text-center">Recent tasks
					</div>
					<div class="table-responsive">
						<table class="align-middle mb-0 table table-borderless table-striped table-hover">
							<thead>
								<tr class="text-center">
									<th>#</th>
									<th>Name</th>
									<th>Department</th>
									<th>Status</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@if($tasks != null && count($tasks) > 0)
									@foreach($tasks as $task)
									
										<tr class="text-center">
											<td>{{$task->id}}</td>
											<td>{{ ucfirst($task->title) }}</td>
											<td>{{ \App\Models\Department::find($task->dep_id)->name }}</td>
											<td>
												@if($task->status == 1)
													<div class="badge badge-success">Active</div>
												@elseif($task->status == 2)
													<div class="badge badge-primary">Done</div>
												@else
													<div class="badge badge-danger">Inactive</div>
												@endif
											</td>
											@if($task->status == 1)
												<td>
													<a href="" class="btn btn-primary">Edit Progress</a>
												</td>
											@else
											<td>
												-
											</tr>
											@endif
									@endforeach
								@else
									<tr>
										<td colspan="5" class="text-center">
											No tasks yet add some <a href="/admin/tasks/add">here</a>
										</td>
									</tr>
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
@endsection