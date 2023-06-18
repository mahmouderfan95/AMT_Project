@extends('layouts.app')
@section('filter_search')

@stop
@section('content')
    <div class="container-fluid">
        <div class="stud">
{{--            <div class="container mt-5">--}}
{{--                <div class="input-group mb-3 mt-5 d-flex justify-content-center">--}}
{{--                    <input--}}
{{--                        type="search"--}}
{{--                        placeholder="Search"--}}
{{--                        aria-label="Search"--}}
{{--                        class="form-control search"--}}
{{--                        aria-describedby="basic-addon2"--}}
{{--                    />--}}
{{--                    <span class="input-group-text" id="basic-addon2">Search</span>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="container mt-5">
                <div class="row">
                    <!-- row -->
                    <div
                        class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center mt-5"
                    >
                        <div class="delete">
                            <ul>
                                <h1>Add / Delete</h1>
                                <li>add/delete doctors</li>
                                <li>add/delete Assistant</li>
                                <li>add/delete student</li>
                                <li>add/delete course</li>
                            </ul>
                            <div class="delete-img">
                                <a href="{{route('getStaffs')}}">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                    <!-- row -->
                    <div
                        class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center mt-5"
                    >
                        <div class="delete">
                            <ul>
                                <h1>View details</h1>
                                <li>view student details</li>
                                <li>view staff details</li>
                            </ul>
                            <div class="delete-img">
                                <a href="#" onclick="myFunction()">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                    <!-- row -->
                    <div
                        class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center mt-5"
                    >
                        <div class="delete">
                            <ul>
                                <h1>Create Reporting</h1>
                                <li>attendance report</li>
                                <li>attendance report</li>
                            </ul>
                            <div class="delete-img">
                                <a href="#">
                                    <i class="fa-solid fa-gas-pump"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                    <!-- row -->
                    <div
                        class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center mt-5"
                    >
                        <div class="delete">
                            <ul>
                                <h1>Send Alerts</h1>
                                <li>attendance alerts</li>
                            </ul>
                            <div class="delete-img">
                                <a href="#">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                </div>
            </div>

            <!-- modal -->
            <div class="container">
                <div class="add">
                    <div class="modal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                        onclick="closeModal();"
                                    ></button>
                                </div>
                                <h5 class="modal-title text-center">Enter ID</h5>

                                <form action="{{route('search.user')}}" method="GET" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input
                                            required="required"
                                            name="search"
                                            type="number"
                                            class="form-control"
                                            id="inputEmail3"
                                            placeholder="ID"
                                            min="1"
                                            maxlength="4"
                                        />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="clos" data-bs-dismiss="modal">
                                            OK
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- container -->
        </div>
        <!-- container-fluid -->
    </div>
    @include('layouts.edit_profile')
@stop
