@extends('admin.layouts.app')

@section('title')
Update Department
@endsection

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Department Update</h5>
                            <form class="" id="update_department">
                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">Name</label>
                                    <input name="name" value="{{ $department->name }}" id="emp_name" placeholder="Enter Department Name" type="text" class="form-control">
                                    <input name="id" value="{{ $department->id }}" id="id" placeholder="Enter Your Name" type="hidden" class="form-control">
                                    <br>
                                    <label class="info-icon">Employee(s) &#9432;
                                        <span class="tooltip">Press CTRL button to select multiple employees</span>
                                    </label>
                                    <select name="employee[]" id="employee_id" class="form-control" multiple style="height: 60px;">
                                        <option value="" hidden>Select Employee</option>
                                        @foreach ($employees as $employee)
                                            @if (in_array($employee->id, json_decode($department->emp_list)))
                                                <option value="{{ $employee->id }}" selected>{{ $employee->name }}</option>
                                            @else
                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
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
    $("#update_department").submit( function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '{{ route("admin.department.update") }}',
            data: formData,
            dataType:'json',
            contentType: false,
            processData: false,
            success: (data) => {
                if(data.success==true){
                    alert(data.message)
                    window.location.href = '{{ route("admin.dashboard") }}'
                }else{
                    alert(data.message)
                }
            }
        })

    })
       
</script>
@endsection