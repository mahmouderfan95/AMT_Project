@extends('Admin.layouts.mastar')
@section('title','Students'))
@section('css')

@endsection
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Students</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Homepage</a>
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right">
                        <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm mb-3">
                            Add New Student
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" id="data-table-search" class="form-control" autofocus placeholder="Search" >
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section >
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Students</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered " id="students-table" width="100%" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Student ID</th>
                                                    <th>Email</th>
                                                    <th>Image</th>
                                                    <th>Student GPA</th>
                                                    <th>Student Level</th>
                                                    <th>Created At</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        let catsTable = $('#students-table').DataTable({
            // dom: 'Bprltip',
            // buttons: [
            //     'excel',
            //     'pdf',
            //     {
            //         extend: 'print',
            //         text: 'Print selected',
            //         exportOptions: {
            //             columns: ':visible'
            //         }
            //     },
            //     'colvis'
            // ],
            select: true,
            serverSide: true,
            processing: true,
            Savestate :true,
            scrollX: true,
            scrollY: '70vh',
            scrollCollapse: true,
            pagingType: "full_numbers",
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            ajax: {
                url: '{{ route('students.data') }}',
                type: 'GET',
            },
            columns: [

                {data: 'DT_RowIndex', name: '', orderable:false, searchable: false},
                {data: 'name', name: 'name', searchable: true,sortable: true,orderable: true},
                {data: 'staff_id', name: 'staff_id', searchable: true,sortable: true,orderable: true},
                {data: 'email', name: 'email', searchable: true,sortable: true,orderable: true},
                {data: 'image', name: 'image', searchable: false, sortable: false, width: '10%'},
                {data: 'st_gpa', name: 'st_gpa', sortable: true, width: '10%'},
                {data: 'st_level', name: 'st_level', sortable: true, width: '10%'},
                {data: 'created_at', name: 'created_at', sortable: true, width: '10%'},
                {data: 'actions', name: 'actions', searchable: false, sortable: false, width: '20%'},
            ],
            order: [[4, 'desc']],
        });
        $('#data-table-search').keyup(function () {
            catsTable.search(this.value).draw();
        })
    </script>

@endpush
