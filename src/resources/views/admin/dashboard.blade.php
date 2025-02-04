@extends('admin.layouts.app')

@section('title')
Dashboard
@endsection

@section('content')
<div class="app-main__outer">
	<div class="app-main__inner">
	
		{{-- Recent Tasks --}}
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
													<div class="btn btn-primary">Done</div>
												@else
													<div class="badge badge-danger">Inactive</div>
												@endif
											</td>
											<td>
												@if($task->status == 2)
												<button class="btn btn-danger" id="delete-task" data-id='{{ $task->id }}'>Delete</button>
												<a href="{{ route('admin.task.detail', ['id' => $task->id]) }}" class="btn" style="background-color: #FF8C00; color: #fff;">
													<i class="fa fa-eye" style="font-size: 15px;"></i>
												</a>	
												@else	
												<button class="btn btn-danger" id="delete-task" data-id='{{ $task->id }}'>Delete</button>
												<a href="{{ route('admin.task.edit', ['id' => $task->id]) }}" class="btn btn-primary">Edit</a>
												<a href="{{ route('admin.task.detail', ['id' => $task->id]) }}" class="btn" style="background-color: #FF8C00; color: #fff;">
													<i class="fa fa-eye" style="font-size: 15px;"></i>
												</a>														
												@endif								
											</tr>
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
		{{-- End Recent Tasks --}}

		{{-- Chart --}}
		<div class="row">
			<div class="col-md-5">
				<div class="card">
					<div class="card-body">
						<canvas id="myChart" height="300px"></canvas>
					</div>
				</div>
			</div>
			<div class="col-md-2">
			</div>
			<div class="col-md-5">
				<div class="card">
					<div class="card-body">
						<canvas id="myChart2" height="150px"></canvas>
					</div>
				</div>
			</div>
		</div>
		<br>
		{{-- End Chart --}}


				
		{{-- Progress Bar --}}
		<div class="row justify-content-center flex-wrap">
			@forelse($tasks as $task)
			@if($task->due_date <= $task->created_at)
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script>
				$(document).ready(function() {
					$.ajax({
						url: "{{ route('task.disable', ['id' => $task->id]) }}",
						type: 'GET'
					});
				});
			</script>		
			@endif
			@if($task->status == 1)
				
			<div class="col-md-3 prog-col mb-4">
				<div class="container">
					<div class="circular-progress{{$task->id}}">
						<span class="progress-value{{$task->id}}">0%</span>
						@php
							$diff = date_diff(date_create(date('Y-m-d')), date_create($task->due_date));
							$intial_diff = date_diff(date_create(date('Y-m-d')), date_create($task->created_at));
						@endphp
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
							
							.circular-progress{{$task->id}} {
								position: relative;
								height: 250px;
								width: 250px;
								border-radius: 50%;
								display: flex;
								align-items: center;
								justify-content: center;
							}
							
							.circular-progress{{$task->id}}::before {
								content: "";
								position: absolute;
								height: 210px;
								width: 210px;
								border-radius: 50%;
								background-color: #fff;
							}
							
							.progress-value{{$task->id}}{
								position: relative;
								font-size: 40px;
								font-weight: 600;
								@if($diff->days < 10)
									color: #ff0000;
								@elseif($diff->days < 20)
									color: #FFA500;
								@else
									color: #40BABD;
								@endif
							}
							.text {
								font-size: 20px;
								font-weight: 500;
								color: #606060;
							}
						</style>
						<script>
							let circularProgress{{$task->id}} = document.querySelector(".circular-progress{{$task->id}}"),
							progressValue{{$task->id}} = document.querySelector(".progress-value{{$task->id}}");
							
							let progressInitialValue{{$task->id}} =	0,    
							progressFinalValue{{$task->id}} = {{$diff->days}},  
							speed{{$task->id}} = 25;
							
							let progress{{$task->id}} = setInterval(() => {
								progressInitialValue{{$task->id}}++;
								progressValue{{$task->id}}.textContent = `${progressInitialValue{{$task->id}}} DAYS`
								@if($diff->days < 10)
									circularProgress{{$task->id}}.style.background = `conic-gradient(#ff0000 ${progressInitialValue{{$task->id}} * 3.6}deg, #ededed 0deg)`
								@elseif($diff->days < 20)
									circularProgress{{$task->id}}.style.background = `conic-gradient(#FFA500 ${progressInitialValue{{$task->id}} * 3.6}deg, #ededed 0deg)`
								@else
									circularProgress{{$task->id}}.style.background = `conic-gradient(#40BABD ${progressInitialValue{{$task->id}} * 3.6}deg, #ededed 0deg)`								
								@endif

								if(progressInitialValue{{$task->id}} == progressFinalValue{{$task->id}}){
									clearInterval(progress{{$task->id}});
								}    
							}, speed{{$task->id}});
							</script>
					</div>
					<br>
					<span class="text">Remaining days for : 
						<span class="task-name" 
						style="
						text-decoration: solid underline;
								@if($diff->days < 10)
									color: #ff0000 !important; 
								@elseif($diff->days < 20)
									color: #FFA500 !important;
								@else
									color: #40BABD !important;
								@endif
								/* writing tasks capitalized*/
								text-transform: capitalize;
						">
							{{$task->title}}
						</span></span>
					</div>
				</div>
				<div class="col-md-1">		
				</div>
				@endif
				@empty
				
				@endforelse
				
		</div>
		<br>
		{{-- End Progress Bar --}}
	

	</div>
</div>




@endsection
@section('footer')
<script>
	const ctx = document.getElementById('myChart').getContext('2d');
	const xValues = ["Employees", "Departments", "Tasks"];
	const yValues = [{{\App\Models\Employee::count()}}, {{\App\Models\Department::count()}}, {{\App\Models\Task::count()}}];
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
			datasets: [
				{
					label: 'Employees',
					backgroundColor: barColors[0],
					data: [yValues[0], 0, 0]
				},
				{
					label: 'Departments',
					backgroundColor: barColors[1],
					data: [0, yValues[1], 0]
				},
				{
					label: 'Tasks',
					backgroundColor: barColors[2],
					data: [0, 0, yValues[2]]
				}
			]
		},
		options: {
			plugins: {
				legend: {
					display: true
				},
				title: {
					display: true,
					text: 'Total'
				}
			},
			scales: {
				y: {
					ticks: {
						display: false
					}
				}
			}
		}
	});
</script>
<script>
	const ctx2 = document.getElementById('myChart2').getContext('2d');
	//departements used chart
	const xValues2 = [
		@foreach($departements as $department)
		@if($department->name != "Non-Assigned")
            "{{ $department->name }}",
		@endif
        @endforeach
	];
	const yValues2 = [
		@foreach($departements as $department)
		@if($department->name != "Non-Assigned")
			{{ \App\Models\Task::where('dep_id', $department->id)->count()}},
		@endif
		@endforeach
	];

	new Chart(ctx2, {
		type: "pie",
		data: {
			labels: xValues2,
			datasets: [
				{
					data: yValues2,
				}
			]
		},

		options: {
			plugins: {
				legend: {
					display: true
				},
				title: {
					display: true,
					text: 'Tasks by Departments'
				},
				tooltip: {
                    callbacks: {
                        label: function(context) {
						const label = context.label.charAt(0).toUpperCase() + context.label.slice(1).toLowerCase();
						const value = context.parsed;
						return `${label}'s departement tasks: ${value}`;
                        }
                    }
                }
			},
		}
	});
</script>
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
						Swal.fire({
							title: 'Success',
							text: data.message,
							icon: 'success',
							confirmButtonText: 'Ok'
						}).then(() => {
							window.location.href = "{{ route('admin.dashboard') }}"
						}) // Added closing brackets here
					} else {
						Swal.fire({
							title: 'Error',
							text: data.message,
							icon: 'error',
							confirmButtonText: 'Ok'
						})
					}
				}
			})
		}
	})
</script>
@endsection