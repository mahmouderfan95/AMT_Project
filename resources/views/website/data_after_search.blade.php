@extends('layouts.app')
@section('filter_search')


@stop
@section('content')
    <div class="add-hed">
        <div class="container">
            <div class="it-img position-relative">
                <img src="{{asset('dashboard/uploads/staffs/' . $user->image)}}" width="100" height="100" alt="" />
            </div>

            <h2>{{$user->name}}</h2>
            <p class="opasss">{{$user->staff_id}}</p>
{{--            <div class="home-for Selected">--}}
{{--                <select--}}
{{--                    class="form-select add-form"--}}
{{--                    aria-label="Default select example"--}}
{{--                >--}}
{{--                    <i class="fa-solid fa-user"></i>--}}
{{--                    <option selected>Selected topics in IS</option>--}}
{{--                    <option value="1">One</option>--}}
{{--                    <option value="2">Two</option>--}}
{{--                    <option value="3">Three</option>--}}
{{--                </select>--}}
{{--            </div>--}}
            <div class="for-add">
                <div class="row">
                    <div
                        class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-5 d-flex justify-content-lg-end"
                    >
                        <div class="add1">
                            <h1>Attendance Rate</h1>
                            <h2>45%</h2>
                        </div>
                    </div>
                    <div
                        class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-5 d-flex justify-content-lg-start"
                    >
                        <div class="add1">
                            <h1>Attendance Rate</h1>
                            <h2>55%</h2>
                        </div>
                    </div>
                    <div
                        class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-5 d-flex justify-content-lg-end"
                    >
                        <div class="add1">
                            <h1>GPA</h1>
                            <h2>{{$user->st_gpa}}</h2>
                        </div>
                    </div>
                    <div
                        class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-5 d-flex justify-content-lg-start"
                    >
                        <div class="add1">
                            <h1>Level</h1>
                            <h2>{{$user->st_level}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
