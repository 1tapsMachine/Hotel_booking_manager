@extends('user.layouts.app')

@section('title')
    List of Tasks
@endsection

@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="container-fluid">

                <div class="card">
                    <div class="card-header">
                        <h3>List of tasks</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="list_tasks" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Departement Name</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Publish Date</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
								@foreach ($tasks as $task)
										<tr>
											<td>{{ $task->id }}</td>
											<td>{{ \App\Models\Department::find($task->dep_id)->name }}</td>
											<td>{{ $task->title }}</td>
											<td>{{ $task->content }}</td>
											<td>{{ $task->date }}</td>
											<td>{{ $task->due_date }}</td>
											<td>{{ $task->status == 1 ? 'Active' : 'Inactive' }}</td>
											@if($task->status == 1)
                                            <td>
												<a href="/user/task/progress/{{$task->id}}" class="btn btn-primary">Edit Progress</a>
											</td>
                                            @else
                                            <td>
                                                -
                                            </td>
                                            @endif
										</tr>
								@endforeach
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
		$(document).ready(function() {
			$('#list_tasks').DataTable();
		});
	</script>
@endsection