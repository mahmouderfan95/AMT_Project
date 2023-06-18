@extends('layouts.app')
@section('filter_search')
    <form action="#" method="GET">
        <div class="row">
            <div class="no-wid">
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12"></div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mt-5">
                    <select name="person_type"
                        class="form-select wedth-form"
                        aria-label="Default select example"
                    >
                        <i class="fa-solid fa-user"></i>
                        <option hidden value="">Choose Staff</option>
                        <option value="ass">Assistants</option>
                        <option value="dr">Doctor</option>
                    </select>
                </div>
                <!-- one -->
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mt-5">
                    <!-- tow -->
                    <input type="date" name="created_at" class="form-control wedth-form">

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
    <section>
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
                            <button type="submit" class="input-group-text" id="basic-addon2">Search</button>
                    </div>
                @if(auth('web')->user()->person_type == 'super')
                    <button
                        onclick="myFunction()"
                        class="btn btn-primary"
                        type="button"
                        id="Add"
                    >
                        <i class="fa-solid fa-plus"></i> Add New Staff
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
{{--                        <th scope="col">Arrival</th>--}}
{{--                        <th scope="col">leave</th>--}}
                        <th scope="col">Email</th>
                        <th scope="col">Staff Type</th>
{{--                        <th class="dar" scope="col">Attendance</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                        @if($staffs->count() > 0)
                            @foreach($staffs as $index => $item)
                                <tr>
                                    <th scope="row">{{$index + 1}}</th>
                                    <td>{{$item->staff_id}}</td>
                                    <td>{{$item->name}}</td>
            {{--                        <td>10:06 Am</td>--}}
            {{--                        <td>02:06 Pm</td>--}}
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->getType()}}</td>
{{--                                    <td>--}}
{{--                                        <span class="te-red">1</span><span class="te-gren">3</span>--}}
{{--                                        <span class="te-red">2</span><span class="te-gren">4</span>--}}
{{--                                        <span class="te-red">5</span><span class="te-gren">6</span>--}}
{{--                                        <span class="te-de">5</span><span class="te-de">6</span>--}}
{{--                                    </td>--}}
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    {{$staffs->links()}}
                </table>
                <!-- teb -->
            </div>
        </div>
        <!-- container -->
    </section>
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
                            ></button>
                        </div>
                        <h5 class="modal-title text-center">Add New Staff</h5>

                        <form action="{{route('addStaff')}}" method="POST" enctype="multipart/form-data">
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
                                <select required="required" name="person_type" class="form-control">
                                    <option value="dr">Doctor</option>
                                    <option value="ass">Assistant</option>
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
@stop
