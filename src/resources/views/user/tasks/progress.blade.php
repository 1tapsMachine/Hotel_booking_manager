@extends('user.layouts.app')

@section('title')
Task "{{$task->title}}" Progress
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
				<div class="card-body d-flex align-items-center justify-content-center" style="height: 380px;">
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
						<tr>
							<th>Progress</th>
							<td>
								<div class="progress">
									<div class="progress-bar" role="progressbar" style="width: {{ $task->progress }}%"
										aria-valuenow="{{ $task->progress }}" aria-valuemin="0" aria-valuemax="100">
										{{ $task->progress }}%
									</div>
								</div>
							</td>

						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header text-center">
					Actions
				</div>
				<div class="card-body d-flex flex-column align-items-center justify-content-center" style="height: 240px;">
					<h5 class="mb-1" style="color: #888;">Task Description :</h5>
					<textarea name="description" id="description" class="form-control" rows="3" placeholder="Task Description" disabled>
						{{ $task->content }}
					</textarea>
					<h5 class="" style="color: #888;">Days Remaining :</h5>
					<h1 style="font-size: 2.5rem; color: #333;">
						@php
							$days = date_diff(date_create(date('Y-m-d')), date_create($task->due_date));
						@endphp
						{{ $days->days }}
					</h1>
				</div>
				<div class="card-footer text-center w-100">
					<form action="" method="POST" id="progress_edit" class="w-100">
						@csrf
						<div class="form-group d-flex align-items-center w-100">
							<label for="progress" class="mr-3 flex-grow-1">Edit Progress :</label>
							<input type="hidden" name="task_id" value="{{ $task->id }}">
							<input type="number" name="progress" id="progress" class="form-control" min="0" max="100" value="{{ $task->progress }}">
						</div>						
						<button type="submit" class="btn btn-primary" id="#edit">Update</button>
					</form>				
				</div>
			</div>
		</div>
	</div>
	@endsection

	@section('footer')
	<script>
		$("#progress_edit").submit(function (e) {
			e.preventDefault();
			const formData = new FormData(this);

			$.ajax({
				type: 'POST',
				url: "{{ route('user.task.edit_progress', ['id' => $task->id]) }}",
				data: formData,
            dataType:'json',
            contentType: false,
            processData: false,
            success: (data) => {
                if(data.success==true){
                    Swal.fire({
                        title: 'Success',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    }).then(() => {
                        window.location.href = "{{ route('user.dashboard') }}"
                    })
                }else{
                    Swal.fire({
                        title: 'Error',
                        text: data.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }
			});
		});
	</script>
	@endsection