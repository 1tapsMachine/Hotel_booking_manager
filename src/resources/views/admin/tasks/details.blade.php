@extends('admin.layouts.app')

@section('title')
Details of Task N°: {{ $task->id }}
@endsection

@section('content')
<div class="container mt-5">
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					Task Details
					<a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Return to Dashboard</a>
				</div>
				<div class="card-body d-flex align-items-center justify-content-center" style="height: 350px;">
					<table class="table" style="line-height: 2; max-height: 80%;">
						<tr>
							<th>ID</th>
							<td>{{ $task->id }}</td>
						</tr>
						<tr>
							<th>Title</th>
							<td>{{ ucwords($task->title) }}</td>
						</tr>
						<tr>
							<th>Description</th>
							<td>{{ ucwords($task->content) }}</td>
						</tr>
						<tr>
							<th>Created At</th>
							<td>{{ $task->created_at }}</td>
						</tr>
						<tr>
							<th>Updated At</th>
							<td>{{ $task->updated_at }}</td>
						</tr>
					</table>
				</div>			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					Actions
				</div>
				<div class="card-body d-flex flex-column align-items-center" style="height: 350px;">
					<!-- Pie chart -->
					<canvas id="myChart"></canvas>

					<!-- Buttons -->
					<div class="mt-auto text-center">
						<a href="{{ route('admin.task.edit', $task->id) }}" class="btn btn-primary">Edit</a>
						<form action="{{ route('admin.task.delete') }}" method="POST" style="display: inline;">
							@csrf
							<button class="btn btn-danger" id="delete-task" data-id='{{ $task->id }}'>Delete</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('footer')
<script>
	$(document).ready(function() {
            $('#list_tasks').DataTable();
        });

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
						window.location.href = "{{ route('admin.task.list') }}"
					})
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

@endsection