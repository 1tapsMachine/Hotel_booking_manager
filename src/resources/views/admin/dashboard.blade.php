@extends('admin.layouts.app')

@section('title')
Dashboard
@endsection

@section('content')
<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="row">
			<div class="col-md-6 col-xl-4">
				<div class="card mb-3 widget-content bg-midnight-bloom">
					<div class="widget-content-wrapper text-white">
						<div class="widget-content-left">
							<div class="widget-heading">Total Tasks</div>
							<div class="widget-subheading"></div>
						</div>
						<div class="widget-content-right">
							<div class="widget-numbers text-white"><span>{{\App\Models\Task::count()}}</span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xl-4">
				<div class="card mb-3 widget-content bg-arielle-smile">
					<div class="widget-content-wrapper text-white">
						<div class="widget-content-left">
							<div class="widget-heading">Employees</div>
							<div class="widget-subheading"></div>
						</div>
						<div class="widget-content-right">
							<div class="widget-numbers text-white"><span>
									{{\App\Models\Task::count()}}
								</span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xl-4">
				<div class="card mb-3 widget-content bg-grow-early">
					<div class="widget-content-wrapper text-white">
						<div class="widget-content-left">
							<div class="widget-heading">Managers</div>
							<div class="widget-subheading"></div>
						</div>
						<div class="widget-content-right">
							<div class="widget-numbers text-white"><span>
									{{\App\Models\Admin::count()}}
								</span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="d-xl-block d-lg-block col-md-6 col-xl-4">
				<div class="card mb-3 widget-content bg-premium-dark">
					<div class="widget-content-wrapper text-white">
						<div class="widget-content-left">
							<div class="widget-heading">Department</div>
							<div class="widget-subheading"></div>
						</div>
						<div class="widget-content-right">
							<div class="widget-numbers text-warning"><span>
									{{\App\Models\Department::count()}}
								</span></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="card-header">Recent tasks
					</div>
					<div class="table-responsive">
						<table class="align-middle mb-0 table table-borderless table-striped table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th>Name</th>
									<th class="text-center">Employee</th>
									<th class="text-center">Status</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								@if($tasks != null && count($tasks) > 0)
									@foreach($tasks as $task)
									<tr>
										<td>
											{{$task->id}}
										</td>
										<td>
											{{$task->title}}
										</td>
										<td>
											{{$task->emp_id}}
										</td>
										<td>
											@if($task->status == 1)
											<center>
												<div class="badge badge-success">
													Active
												</div>
											</center>
											@else
											<center>
												<div class="badge badge-danger">
													Inactive
												</div>
											</center>
											@endif
										</td>

										<td>
											<center>
												<button class="btn btn-danger" id="delete-task"
													data-id='{{ $task->id }}'>Delete</button>
												<a href="{{ route('admin.task.edit', ['id' => $task->id]) }}"
													class="btn btn-primary">Edit</a>
											</center>
										</td>

									</tr>
									@endforeach
								@else
								<tr>
									<td colspan="5">
										<center>
											No tasks yet add some <a href="/admin/tasks/add">here</a>
										</center>
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
</div>



@endsection
@section('footer')
    <script>
        $(document).on('click', '#delete-task', function(e) {
            e.preventDefault();

            const id = $(this).data('id');
            if (id != "") {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.task.delete') }}",
                    data: {
                        id,
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: (data) => {
                        if (data.success == true) {
                            alert(data.message);
                            window.location.href = "{{ route('admin.dashboard') }}"
                        } else {
                            alert(data.message);

                        }
                    }
                })
            }
        })
    </script>
@endsection
