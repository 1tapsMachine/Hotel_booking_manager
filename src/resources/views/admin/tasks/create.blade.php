@extends('admin.layouts.app')

@section('title')
    Create Task
@endsection

@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Task Create</h5>
                                <form class="" id="create_task">
                                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">List of Departements</label>
                                        <select name="departement" id="departement" class="form-control">
                                            <option value="" hidden>Select Departement</option>
                                           @forelse ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                               
                                           @empty
                                            <option value="" disabled>Departement list not found</option>
                                               
                                           @endforelse
                                        </select>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Title</label>
                                        <input name="title" id="title" placeholder="Enter Your Title" type="text"
                                            class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Content/Description</label>
                                        <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Publish Date</label>
                                        <input name="date" id="date" placeholder="" type="date" class="form-control" value="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Due Date</label>
                                        <input name="due_date" id="due_date" placeholder="" type="date" class="form-control" min="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="mt-1 btn btn-primary">Create</button>
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
   $("#create_task").submit( function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '{{ route("admin.task.create") }}',
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
                        window.location.href = "{{ route('admin.task.list') }}"
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
        })

    })
       
    </script>
@endsection