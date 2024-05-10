@extends('user.layouts.app')

@section('title')
Task "{{$task->title}}" Progress
@endsection

@section('content')

<div class="card">
	<div class="card-header">
		Task Progress
	</div>
	<div class="card-body">
		<!-- Your first progress bar code here -->
	</div>
</div>

<div class="card">
	<div class="card-header">
		Remaining Days
	</div>
	<div class="card-body">
		<!-- Your second progress bar code here -->
	</div>
</div>

@endsection