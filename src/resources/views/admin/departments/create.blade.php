@extends('admin.layouts.app')

@section('title')
Department
@endsection

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Department Create</h5>
                            <form class="" id="create_department">
                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">Name</label>
                                    <input name="name" id="emp_name" placeholder="Enter Department Name" type="text"
                                        class="form-control">
                                    <br>
                                    <label class="info-icon">Employee(s) &#9432;
                                        <span class="tooltip">Press CTRL button to select multiple employees</span>
                                    </label>
                                    <select name="employee[]" id="employee_id" class="form-control" multiple style="
                                    height: 60px;
                                    ">
                                        <option value="" hidden>Select Employee</option>
                                        @forelse ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                        @empty
                                        <option value="" disabled>Employee list not found</option>

                                        @endforelse
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
    $("#create_department").submit( function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '{{ route("admin.department.store") }}',
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
                    }).then((result) => {
                            window.location.href = "{{ route('admin.department.list') }}";
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