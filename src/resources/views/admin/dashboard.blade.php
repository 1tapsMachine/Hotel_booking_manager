@extends('admin.layouts.app')

@section('title')
Dashboard
@endsection

@section('content')
<div class="app-main__outer">
	<div class="app-main__inner">
		{{-- <div class="row">
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
			<div class="col-md-6 col-xl-4">
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
		</div>--}}
		<div class="row">
			<div class="col-md-3 prog-col">
				<div class="container">
					<div class="circular-progress">
						<span class="progress-value">0%</span>
						<style>
							.prog-col{
								margin: 0;
								/* transform: scale(0.5); */
							}
							.container {
								display: flex;
								width: 420px;
								padding: 50px 0;
								border-radius: 8px;
								background: #fff;
								flex-direction: column;
								align-items: center;
							}

							.circular-progress {
								position: relative;
								height: 250px;
								width: 250px;
								border-radius: 50%;
								background: conic-gradient(#40BABD 3.6deg, #ededed 0deg);
								display: flex;
								align-items: center;
								justify-content: center;
							}

							.circular-progress::before {
								content: "";
								position: absolute;
								height: 210px;
								width: 210px;
								border-radius: 50%;
								background-color: #fff;
							}

							.progress-value {
								position: relative;
								font-size: 40px;
								font-weight: 600;
								color: #40BABD;
							}

							.text {
								font-size: 30px;
								font-weight: 500;
								color: #606060;
							}
						</style>
						<script>
							let circularProgress = document.querySelector(".circular-progress"),
    						progressValue = document.querySelector(".progress-value");

							let progressStartValue = 0,    
								progressEndValue = 90,    
								speed = 20;
								
							let progress = setInterval(() => {
								progressStartValue++;

								progressValue.textContent = `${progressStartValue}%`
								circularProgress.style.background = `conic-gradient(#40BABD ${progressStartValue * 3.6}deg, #ededed 0deg)`

								if(progressStartValue == progressEndValue){
									clearInterval(progress);
								}    
							}, speed);
						</script>
					</div>
					<span class="text"></span>
				</div>
			</div>
			<div class="col-md-1">		
			</div>
			
		</div>
		<br>
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
									<th class="text-center">Department</th>
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
										{{\App\Models\Department::find($task->dep_id)->name}}
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
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<canvas id="myChart"></canvas>
					</div>
				</div>
			</div>
		</div>
		<br>
	</div>
</div>




@endsection
@section('footer')
<script>
	const ctx = document.getElementById('myChart').getContext('2d');
	const xValues = ["Employee", "Department", "Task", "Manager"];
	const yValues = [{{\App\Models\Employee::count()}}, {{\App\Models\Department::count()}}, {{\App\Models\Task::count()}}, {{\App\Models\Admin::count()}}];
	const barColors = [
		"#b91d47",
		"#00aba9",
		"#2b5797",
		"#e8c3b9"
	];
	new Chart(ctx, {
		type: "bar",
		data: {
			labels: xValues,
			datasets: [{
				backgroundColor: barColors,
				data: yValues
			}]
		},
		options: {
			plugins: {
				legend: {
					display: false
				},
				title: {
					display: true,
					text: 'Total'
				}
			}
		}
	}); // Corrected this line
	
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