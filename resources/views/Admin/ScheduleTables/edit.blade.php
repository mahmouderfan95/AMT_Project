@extends('Admin.layouts.mastar')
@section('title','Edit')
@section('css')
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">Schedule Tables</h4>
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
                                    <div class="card-body">
                                        <form  class="form" action="{{ route('ScheduleTables.update','test') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{$suc->id}}">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="course_id">Choose Course</label>
                                                            <select id="course_id" class="form-control" name="course_id" required>
                                                                @foreach($courses as $course)
                                                                    <option value="" hidden>Choose Course</option>
                                                                    <option {{$course->id == $suc->course_id ? 'selected' : ''}} value="{{$course->id}}">{{$course->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('course_id')
                                                        <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="user_id">Choose Student</label>
                                                            <select id="user_id" class="form-control" name="user_id" required>
                                                                @foreach($users as $user)
                                                                    <option value="" hidden>Choose Staff</option>
                                                                    <option {{$user->id == $suc->student_id ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('user_id')
                                                        <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>  Save
                                                </button>
                                            </div>
                                        </form>
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
