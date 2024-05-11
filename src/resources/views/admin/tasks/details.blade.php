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
						<tr>
							<th>Due Date</th>
							<td>{{ $task->due_date }}</td>
						</tr>
					</table>
				</div>		
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					Actions
				</div>
				<div class="card-body d-flex flex-column align-items-center" style="height: 350px;">
					{{-- progress bar --}}
					<h3>
						Progress of the task N°: {{ $task->id }}
					</h3>
					<span id="progress">
						{{ $task->progress }}%
					</span>
					<style>
						#progress {
							font-size: 10vh;
							font-weight: bold;
							color: {{ $task->progress >= 75 ? 'green' : ($task->progress >= 50 ? 'orange' : 'red') }};

						}
						.progress {
							width: 100%;
							height: 30px;
							border: 1px solid #000;
						}
					</style>
					<div class="progress" style="height: 30px;">
						<div class="progress-bar 
							{{ $task->progress >= 75 ? 'bg-success' : ($task->progress >= 50 ? 'bg-warning' : 'bg-danger') }}" 
							role="progressbar" 
							style="width: {{ $task->progress }}%;" 
							aria-valuenow="{{ $task->progress }}" 
							aria-valuemin="0" 
							aria-valuemax="100">
						</div>
					</div>
					<!-- Buttons -->
					<div class="mt-auto text-center">
						@if($task->status == 2)
						<button class="btn btn-danger" id="delete-task" data-id='{{ $task->id }}'>Delete</button>
						@else
						<a href="{{ route('admin.task.edit', $task->id) }}" class="btn btn-primary">Edit</a>
						<form action="{{ route('admin.task.delete') }}" method="POST" style="display: inline;">
							@csrf
							<button class="btn btn-danger" id="delete-task" data-id='{{ $task->id }}'>Delete</button>
						</form>
						@endif
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

@endsection