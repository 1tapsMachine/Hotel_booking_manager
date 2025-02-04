@extends('admin.layouts.app')

@section('title')
List of Department
@endsection

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h3>List of Department</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="list_department" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Employee(s)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($departments as $department)
                            <tr>
                                <td>{{ $department->id }}</td>
                                <td>{{ $department->name }}</td>
                                <td>
                                    @foreach ($department->employees as $employee)
                                    {{ $employee->name }},
                                    @endforeach
                                </td>
                                <td>
                                    @if ($department->name != "Non-Assigned")
                                    <button class="btn btn-danger" id="delete-department"
                                        data-id='{{ $department->id }}'>Delete</button>
                                    <a href="{{ route('admin.department.edit', ['id'=>$department->id]) }}"
                                        class="btn btn-primary">Edit</a>

                                    @else
                                    -
                                    @endif
                                </td>
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
            $('#list_department').DataTable();
        });

        $(document).on('click', '#delete-department', function(e) {
            e.preventDefault();

            const id = $(this).data('id');
            if (id != "") {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.department.delete' )}}",
                    data: {
                        id,
                        "_token":"{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: (data) => {
                        if(data.success == true){
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
            }
        })
</script>
@endsection