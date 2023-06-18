@extends('layouts.app')
@section('filter_search')

@stop
@section('content')
    <div class="spas">
        <div class="container mt-5">
            <div class="Lecture-Coming">
                <h2 class="stu-top"><span class="anrel"></span>Lecture Coming</h2>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mt-5">
                        <div class="actio">
                            <h2>Time</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mt-5">
                        <div class="actio">
                            <h2>Grader</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mt-5">
                        <div class="actio">
                            <h2>Subject</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mt-5">
                        <div class="actio">
                            <h2>Action</h2>
                        </div>
                    </div>


                    @if($courses->count() > 0)
                        @foreach($courses as $item)
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mt-5">
                                <div class="actio-wite">
                                    <h2>12:00 Pm</h2>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mt-5">
                                <div class="actio-wite">
                                    <h2>{{$item->level}}th year</h2>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mt-5">
                                <div class="actio-wite">
                                    <h2>{{$item->name}}</h2>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mt-5">
                                <div class="actio-wite">
                                    <h2><i class="fa-solid fa-circle-xmark"></i></h2>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <!-- container -->
            </div>
        </div>
    </div>

    @include('layouts.edit_profile')
@stop
