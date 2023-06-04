@extends('Admin.layouts.mastar')
@section('title','Create Doctor')
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
                                    <h4 class="card-title" id="basic-layout-form">Create New Doctor</h4>
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
                                        <form  class="form" action="{{ route('doctors.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required>
                                                        </div>
                                                        @error('name')
                                                        <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Email</label>
                                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>
                                                        </div>
                                                        @error('email')
                                                        <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Doctor ID</label>
                                                            <input type="text" class="form-control" name="staff_id" value="{{ old('staff_id') }}" placeholder="Doctor ID" required>
                                                        </div>
                                                        @error('staff_id')
                                                        <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Password</label>
                                                            <input type="password" class="form-control" name="password"  placeholder="Password" required>
                                                        </div>
                                                        @error('password')
                                                        <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> Image</label>
                                                            <input type="file" id="projectinput2"
                                                                   class="form-control img" name="image" accept="image/*" />
                                                            <img src="{{ asset('images/logo.png') }}" alt="" class="img-thumbnail img-preview " style="width: 100px">
                                                        </div>
                                                        @error('image')
                                                        <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    {{-- <div class="col-md-6"> --}}
                                                    {{-- </div> --}}
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
