@extends('layouts.app')
@section('filter_search')
    <form action="#" method="GET">
        <div class="row">
            <div class="no-wid">
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12"></div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mt-5">
                    <select name="st_category"
                            class="form-select wedth-form"
                            aria-label="Default select example"
                    >
                        <i class="fa-solid fa-user"></i>
                        <option hidden value="">Category</option>
                        <option value="is">IS</option>
                        <option value="cs">CS</option>
                    </select>
                </div>
                <!-- one -->
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mt-5">
                    <!-- tow -->
                    <select name="st_level"
                            class="form-select wedth-form"
                            aria-label="Default select example"
                    >
                        <i class="fa-solid fa-user"></i>
                        <option hidden value="">Level</option>
                        <option value="is">1</option>
                        <option value="cs">2</option>
                        <option value="cs">3</option>
                        <option value="cs">4</option>
                    </select>
                    <!-- tow -->
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mt-5">
                    <!-- submit -->
                    <button id="Add" class="btn btn-success" type="submit">Filter</button>
                    <!-- tow -->
                </div>
            </div>
        </div>
    </form>
@stop
@section('content')
    <div class="stud">
        <form action="" method="GET">
            <div class="container int mt-5">
                <div class="input-group">
                <input
                    required="required"
                    name="search"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                    class="form-control search"
                    aria-describedby="basic-addon2"
                    value="{{$search}}"
                />
                <button class="input-group-text" id="basic-addon2">Search</button>
            </div>
                @if(auth('web')->user()->person_type == 'super')
                    <button class="btn btn-primary"
                            type="button"
                                onclick="myFunction()"
                            id="Add"
                    >
                        <i class="fa-solid fa-plus"></i> Add New Student
                    </button>
                @endif
            </div>
        </form>
        <!-- container -->
        <div class="container">
            <div class="teb">
                <!-- teb -->
                <table class="table">
                    <thead>
                        <tr>
                            <th class="dar" scope="col">#No</th>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">GBA</th>
                            <th scope="col">Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($students->count() > 0)
                            @foreach($students as $index => $item)
                                <tr>
                                    <th scope="row">{{$index + 1}}</th>
                                    <td>{{$item->staff_id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->st_gpa}}</td>
                                    <td>{{$item->st_category}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    {{$students->links()}}
                </table>
                <!-- teb -->
            </div>
        </div>
        <!-- container -->

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
                            <h5 class="modal-title text-center">Add New Student</h5>
                            <form action="{{route('addStudent')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <input
                                        required="required"
                                        name="staff_id"
                                        type="number"
                                        class="form-control"
                                        id="inputEmail3"
                                        placeholder="ID"
                                        min="1"
                                        maxlength="4"
                                    />
                                    <input
                                        required="required"
                                        name="name"
                                        type="text"
                                        class="form-control"
                                        placeholder=" Name"
                                        aria-label="First name"
                                    />
                                    <input
                                        required="required"
                                        name="email"
                                        type="email"
                                        class="form-control"
                                        id="inputEmail3"
                                        placeholder="Email"
                                    />
                                    <input
                                        required="required"
                                        name="password"
                                        type="password"
                                        class="form-control"
                                        id="inputEmail3"
                                        placeholder="Password"
                                    />
                                    <input
                                        required="required"
                                        name="image"
                                        type="file"
                                        class="form-control"
                                        id="inputEmail3"
                                    />
                                    <input
                                        required="required"
                                        name="st_gpa"
                                        type="number"
                                        class="form-control"
                                        placeholder="GPA"
                                        aria-label="First name"
                                    />
                                    <select required="required" name="st_level" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    <select required="required" name="st_category" class="form-control">
                                        <option value="is">IS</option>
                                        <option value="cs">CS</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="clos" data-bs-dismiss="modal">
                                        Add
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
    </div>
    @include('layouts.edit_profile')
@stop
