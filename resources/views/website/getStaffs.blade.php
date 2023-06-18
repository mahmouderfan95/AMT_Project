@extends('layouts.app')
@push('css')
    <style>
        .in-hidden{
            display: none;
        }
    </style>
@endpush
@section('filter_search')
    <form action="" method="GET">
        <div class="home-for-form mt-5">
            <!-- one -->
            <div class="home-one">
                <select
                    name="course_id"
                    class="form-select wedth-form"
                    aria-label="Default select example"
                >
                    <i class="fa-solid fa-user"></i>
                    <option value="" hidden>Subjects</option>
                    @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                </select>
            </div>
            <!-- one -->
            <!-- tow -->
            <div class="home-tow">
                <select
                    name="level"
                    class="form-select wedth-form"
                    aria-label="Default select example"
                >
                    <i class="fa-solid fa-user"></i>
                    <option value="" hidden>Level</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <!-- tow -->
            <!-- three -->
            <div class="home-three">
                <select
                    name="category"
                    class="form-select wedth-form"
                    aria-label="Default select example"
                >
                    <i class="fa-solid fa-user"></i>
                    <option value="" hidden>Choose Category</option>
                    <option value="is">Is</option>
                    <option value="cs">Cs</option>
                </select>
            </div>
            <!-- three -->
            <!-- for -->
            <div class="home-for">
                <input type="submit" value="Filter" class="btn btn-success wedth-form">
            </div>
            <!-- for -->
        </div>
    </form>
@stop
@section('content')
    <div class="container mt-5">
        <div class="acthim">
            <div class="input-group ">
                <input
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                    class="form-control search"
                    aria-describedby="basic-addon2"
                />
                <span class="input-group-text" id="basic-addon2">Search</span>
            </div>
            <button
                onclick="myFunction()"
                class="btn btn-primary"
                type="button"
                id="Add"
            >
                <i class="fa-solid fa-plus"></i> Add New Staff
            </button>
        </div>
    </div>
    <div class="container mt-5">


        <div class="teb">
            <!-- teb -->
            <table class="table">
                <thead>
                <tr>
                    <th class="dar" scope="col">#No</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Attendance</th>
                    <th class="dar" colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                    @if($staffs->count() > 0)
                        @foreach($staffs as $index => $item)
                            @if($item->sts->count() > 0)
                                @foreach($item->sts as $index => $sts)
                                    <tr>
                                        <th scope="row">{{$index + 1}}</th>
                                        <td>{{$sts->student->staff_id}}</td>
                                        <td>{{$sts->student->name}}</td>
                                        <td>{{$sts->student->email}}</td>
                                        <td>
                                            @php
                                                $att = \App\Models\StudentAttendance::where('student_id',$sts->student_id)
                                                    ->where('course_id',$sts->course_id)->first();
                                            @endphp
                                            <a href="{{route('attendSt',[$sts->student->id,$sts->course->id,1])}}" style="text-decoration: none">
                                                <span class="{{$att->lecturer_one == 1 ? 'te-gren' : 'te-de'}}">1</span>
                                            </a>
                                            <a href="{{route('attendSt',[$sts->student->id,$sts->course->id,2])}}" style="text-decoration: none">
                                                <span class="{{$att->lecturer_two == 1 ? 'te-gren' : 'te-de'}}">2</span>
                                            </a>
                                            <a href="{{route('attendSt',[$sts->student->id,$sts->course->id,3])}}" style="text-decoration: none">
                                                <span class="{{$att->lecturer_three == 1 ? 'te-gren' : 'te-de'}}">3</span>
                                            </a>
                                            <a href="{{route('attendSt',[$sts->student->id,$sts->course->id,4])}}" style="text-decoration: none">
                                                <span class="{{$att->lecturer_four == 1 ? 'te-gren' : 'te-de'}}">4</span>
                                            </a>
                                            <a href="{{route('attendSt',[$sts->student->id,$sts->course->id,5])}}" style="text-decoration: none">
                                                <span class="{{$att->lecturer_five == 1 ? 'te-gren' : 'te-de'}}">5</span>
                                            </a>
                                            <a href="{{route('attendSt',[$sts->student->id,$sts->course->id,6])}}" style="text-decoration: none">
                                                <span class="{{$att->lecturer_six == 1 ? 'te-gren' : 'te-de'}}">6</span>
                                            </a>
                                            <a href="{{route('attendSt',[$sts->student->id,$sts->course->id,7])}}" style="text-decoration: none">
                                                <span class="{{$att->lecturer_seven == 1 ? 'te-gren' : 'te-de'}}">7</span>
                                            </a>
                                            <a href="{{route('attendSt',[$sts->student->id,$sts->course->id,8])}}" style="text-decoration: none">
                                                <span class="{{$att->lecturer_eight == 1 ? 'te-gren' : 'te-de'}}">8</span>
                                            </a>
                                            <a href="{{route('attendSt',[$sts->student->id,$sts->course->id,9])}}" style="text-decoration: none">
                                                <span class="{{$att->lecturer_nine == 1 ? 'te-gren' : 'te-de'}}">9</span>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('delete_user',$item->id)}}">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                        <td><i class="fa-solid fa-pen"></i></td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                </tbody>
                {{$staffs->links()}}
            </table>
            <!-- teb -->
        </div>

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
                                <select id="person_type" required="required" name="person_type" class="form-control">
                                    <option value="dr">Doctor</option>
                                    <option value="ass">Assistant</option>
                                    <option value="st">Student</option>
                                </select>
                                <input
                                    id="st_gba"
                                    required="required"
                                    name="st_gpa"
                                    type="number"
                                    class="in-hidden form-control"
                                    placeholder="GPA"
                                    aria-label="First name"
                                />
                                <select id="st_level" required="required" name="st_level" class="in-hidden form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                                <select id="st_category" required="required" name="st_category" class="in-hidden form-control">
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
    @include('layouts.edit_profile')

@stop
@push('js')
    <script>
        let person_type = document.getElementById('person_type'),
            st_level = document.getElementById('st_level'),
            st_category = document.getElementById('st_category'),
            st_gba = document.getElementById('st_gba');
            person_type.onchange = function (){
                if (person_type.value == 'st'){
                    st_level.classList.remove('in-hidden');
                    st_category.classList.remove('in-hidden');
                    st_gba.classList.remove('in-hidden');
                }else{
                    st_level.classList.add('in-hidden');
                    st_category.classList.add('in-hidden');
                    st_gba.classList.add('in-hidden');
                }
            }
    </script>
@endpush
