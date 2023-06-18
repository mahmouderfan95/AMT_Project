@extends('layouts.app')
@section('filter_search')

@stop
@section('content')
    <div class="add-hed">
        <div class="container">
            <div class="for-add">
                <div class="row">
                    @if($courses->count() > 0)
                        @foreach($courses as $course)
                            <div
                        class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-5 d-flex justify-content-lg-end"
                    >
                        <div class="add2">
                            <h1>{{$course->name}}</h1>
                            <h2><i class="fa-solid fa-book-open"></i></h2>
                            <ul class="le">
                                <li>{{$course->category}}</li>
                                <li>{{$course->level}} Level</li>
                                <li>{{$course->sts->count() ?? 0}} Student</li>
                            </ul>
                        </div>
                    </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
    @include('layouts.edit_profile')
@stop
