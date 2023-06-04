@extends('layouts.app')
@section('filter_search')

@stop
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="no-wid">
                <!-- row -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div>
{{--                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">--}}
{{--                    <button class="btn btn-primary" type="button">--}}
{{--                        <i class="fa-solid fa-trash"></i> Delete Course--}}
{{--                    </button>--}}
{{--                </div>--}}
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    @if(auth('web')->user()->person_type == 'super')
                        <button class="btn btn-primary" type="button" onclick="myFunction()">
                            <i class="fa-solid fa-plus"></i> Add New Course
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="he">
        <div class="container mt-5">
            <div class="row">
                <!-- row -->
                @if($courses->count() > 0)
                    @foreach($courses as $item)
                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 mt-5 fle">
                            <div class="topics">
                                <h3 class="fw-bold">{{$item->name}} in {{$item->category}}</h3>
                                <h3 class="mt-5">{{$item->course_id}}</h3>
                            </div>
                        </div>
                    @endforeach
                @endif
                <!-- row -->
            </div>
        </div>
        <!-- container -->
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
                            ></button>
                        </div>
                        <h5 class="modal-title text-center">Add New Course</h5>

                        <form action="{{route('addCourse')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <input
                                    required="required"
                                    name="course_id"
                                    type="number"
                                    class="form-control"
                                    id="inputEmail3"
                                    placeholder="Course ID"
                                    min="1"
                                    maxlength="4"
                                />
                                <input
                                    required="required"
                                    name="name"
                                    type="text"
                                    class="form-control"
                                    placeholder=" Course Name"
                                    aria-label="First name"
                                />
                                <select id="level" class="form-control" name="level" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                                <select id="category" class="form-control" name="category" required>
                                    <option value="is">IS</option>
                                    <option value="cs">CS</option>
                                </select>
                                <select id="user" class="form-control" name="user_id" required>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
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
