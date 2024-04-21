@extends('admin.layouts.app')

@section('title')
    Update Task
@endsection

@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Task Update</h5>
                                <form class="" id="update_task">
                                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">List of Departements</label>
                                        <select name="departements" id="employee" class="form-control">
                                            <option value="" hidden>Select departement</option>
                                            @forelse ($departements as $departement)
                                                @if ($departement->id == $task->dep_id)
                                                    @php
                                                        $selected = 'selected';
                                                    @endphp
                                                @else
                                                    @php
                                                        $selected = '';
                                                    @endphp
                                                @endif
                                                <option value="{{ $departement->id }}" {{ $selected }}>
                                                    {{ $departement->name }}</option>

                                            @empty
                                                <option value="">Departement list not found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Title</label>
                                        <input name="title" id="title" value="{{ $task->title }}" placeholder="Enter Your Title" type="text"
                                            class="form-control">
                                            <input name="id" id="id" value="{{ $task->id }}" placeholder="Enter Your Title" type="hidden"
                                            class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Content/Description</label>
                                        <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ $task->content }}</textarea>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Publish Date</label>
                                        <input name="date" id="date" value="{{ $task->date }}" placeholder="" type="date"
                                            class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Due Date
                                        </label>
                                        <input name="due_date" id="due_date" value="{{ $task->due_date }}" placeholder="" type="date"
                                            class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Status</label>
                                        <select name="status" value="{{ $task->status }}" id="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="mt-1 btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $("#update_task").submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: "{{ route('admin.task.update') }}",
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
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

        })
    </script>
@endsection
