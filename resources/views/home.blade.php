@extends('layouts.app')
@section('filter_search')

@stop
@section('content')
    <!-- container -->
    <div class="container">
        <div class="big-cart">
            <div class="row fl-nowr">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <!-- cart -->
                    <div class="cart">
                        <div class="cart-oen">
                            <h1>Total Students</h1>
                        </div>
                        <div class="cart-tow">
                            <i class="fa-solid fa-user-group"></i>
                        </div>
                        <div class="cart-three">
                            <h2>{{\App\Models\User::where('person_type','st')->count()}}</h2>
                        </div>
                        <div class="cart-for">
{{--                            <h3><span>1.3%</span> Than last year</h3>--}}
                        </div>
                    </div>
                    <!-- cart -->
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <!-- cart -->
                    <div class="cart">
                        <div class="cart-oen">
                            <h1>Total Doctors</h1>
                        </div>
                        <div class="cart-tow">
                            <i class="fa-solid fa-user-group"></i>
                        </div>
                        <div class="cart-three">
                            <h2>{{\App\Models\User::where('person_type','dr')->count()}}</h2>
                        </div>
                        <div class="cart-for">
{{--                            <h3><span>1.3%</span> Than last year</h3>--}}
                        </div>
                    </div>
                    <!-- cart -->
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <!-- cart -->
                    <div class="cart">
                        <div class="cart-oen">
                            <h1>Total Assistants</h1>
                        </div>
                        <div class="cart-tow">
                            <i class="fa-solid fa-user-group"></i>
                        </div>
                        <div class="cart-three">
                            <h2>{{\App\Models\User::where('person_type','ass')->count()}}</h2>
                        </div>
                        <div class="cart-for">
{{--                            <h3><span>1.3%</span> Than last year</h3>--}}
                        </div>
                    </div>
                    <!-- cart -->
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <!-- cart -->
                    <div class="cart">
                        <div class="cart-oen">
                            <h1>Total Employees</h1>
                        </div>
                        <div class="cart-tow">
                            <i class="fa-solid fa-user-group"></i>
                        </div>
                        <div class="cart-three">
                            <h2>15</h2>
                        </div>
                        <div class="cart-for">
{{--                            <h3><span>1.3%</span> Than last year</h3>--}}
                        </div>
                    </div>
                    <!-- cart -->
                </div>
            </div>
        </div>
    </div>
    <!-- container -->
    <!-- container -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="student">
                    <h2 class="stu-top">
                        <span class="anrel"></span>Top 5 Students Attendant:
                    </h2>
                    <!-- stu-mg -->
                    @php
                        $st = \App\Models\StudentAttendance::get();
                    @endphp
                    @if($st->count() > 0)
                        @foreach($st as $item)
                            <div class="stu-mg">
                                <div class="stu-one">
                                    <img src="{{asset('dashboard/uploads/staffs/' . $item->student->image)}}" width="30" height="30" alt="" />
                                </div>
                                <div class="stu-tow"><h2>{{$item->student->name}}</h2></div>
                                <div class="stu-three"><span class="mya">100%</span></div>
                                <div class="stu-for"><span class="mya">30Day</span></div>
                            </div>
                            <hr />
                            <!-- stu-mg -->
                        @endforeach
                    @endif
                </div>
            </div>
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
                            ></button>
                        </div>

                        <h5 class="modal-title text-center">Edit Profile</h5>

                        <div class="modal-body">
                            <form action="{{route('userUpdateProfile',auth('web')->user()->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input
                                    name="image"
                                    type="file"
                                    class="form-control"
                                    id="inputGroupFile01"
                                />
                                <input
                                    name="staff_id"
                                    type="number"
                                    class="form-control"
                                    id="inputEmail3"
                                    placeholder="ID"
                                    value="{{$user->staff_id}}"
                                />
                                <input
                                    name="name"
                                    type="text"
                                    class="form-control"
                                    placeholder=" Name"
                                    aria-label="First name"
                                    value="{{$user->name}}"
                                />
                                <input
                                    name="email"
                                    type="email"
                                    class="form-control"
                                    id="inputEmail3"
                                    placeholder="Email"
                                    value="{{$user->email}}"
                                />
                                <div class="modal-footer">
                                    <button type="submit" class="clos" data-bs-dismiss="modal">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
@endsection
