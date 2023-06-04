@extends('Admin.layouts.mastar')
@section('title', __('site.home'))
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
            <!-- Revenue, Hit Rate & Deals -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <a href="#">
                                            <div class="media-body text-left">
                                                <h3 class="info">{{ App\Models\Admin::count() }}</h3>
                                                <h6>Assistant</h6>
                                            </div>
                                            <div>
                                                <i class="icon-users success font-large-2 float-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                    {{-- <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <a href="#">
                                            <div class="media-body text-left">
                                                <h3 class="warning">{{ App\Models\Admin::count() }}</h3>
                                                <h6>Students</h6>
                                            </div>
                                            <div>
                                                <i class="icon-notebook warning font-large-2 float-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                    {{-- <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <a href="#">
                                            <div class="media-body text-left">
                                                <h3 class="success">{{ App\Models\Admin::count() }}</h3>
                                                <h6>Courses</h6>
                                            </div>
                                            <div>
                                                <i class="icon-notebook info font-large-2 float-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                    {{-- <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <a href="#">
                                            <div class="media-body text-left">
                                                <h3 class="success">{{ App\Models\Admin::count() }}</h3>
                                                <h6>Doctors</h6>
                                            </div>
                                            <div>
                                                <i class="icon-notebook info font-large-2 float-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                    {{-- <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div class="row">--}}
{{--                    <div class="col-xl-3 col-lg-6 col-12">--}}
{{--                        <div class="card pull-up">--}}
{{--                            <div class="card-content">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="media d-flex">--}}
{{--                                        @if (auth()->user()->hasPermission('read_product'))--}}
{{--                                            <a href="{{ route('admin.products.index') }}">--}}
{{--                                                <div class="media-body text-left">--}}

{{--                                                    @if (auth('admin')->user())--}}
{{--                                                        <h3 class="info">{{ App\Models\Product::count() }}</h3>--}}
{{--                                                    @endif--}}
{{--                                                    @if (auth('company')->user() && auth('company')->user()->status == true)--}}
{{--                                                        <h3 class="info">--}}
{{--                                                            {{ App\Models\Product::where('company_id', Auth::guard('company')->user()->id)->count() }}--}}
{{--                                                        </h3>--}}
{{--                                                    @endif--}}
{{--                                                    @if (auth('clerk')->user())--}}
{{--                                                        <h3 class="info">--}}
{{--                                                            {{ App\Models\Product::where('company_id', Auth::guard('clerk')->user()->company->id)->count() }}--}}
{{--                                                        </h3>--}}
{{--                                                    @endif--}}
{{--                                                    <h6>{{ __('product.products') }}</h6>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <i class="icon-basket-loaded success font-large-2 float-right"></i>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                    --}}{{-- <div class="progress progress-sm mt-1 mb-0 box-shadow-2">--}}
{{--                                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                    </div> --}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-3 col-lg-6 col-12">--}}
{{--                        <div class="card pull-up">--}}
{{--                            <div class="card-content">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="media d-flex">--}}
{{--                                        @if (auth()->user()->hasPermission('read_colors'))--}}
{{--                                            <a href="{{ route('admin.colors.index') }}">--}}
{{--                                                <div class="media-body text-left">--}}
{{--                                                    <h3 class="success">{{ App\Models\Color::count() }}</h3>--}}
{{--                                                    <h6>{{ trans('colors.colors') }}</h6>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <i class="icon-camera info font-large-2 float-right"></i>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                    --}}{{-- <div class="progress progress-sm mt-1 mb-0 box-shadow-2">--}}
{{--                                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                    </div> --}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-3 col-lg-6 col-12">--}}
{{--                        <div class="card pull-up">--}}
{{--                            <div class="card-content">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="media d-flex">--}}
{{--                                        @if (auth()->user()->hasPermission('read_sizes'))--}}
{{--                                            <a href="{{ route('admin.sizes.index') }}">--}}
{{--                                                <div class="media-body text-left">--}}
{{--                                                    <h3 class="danger">{{ App\Models\Size::count() }}</h3>--}}
{{--                                                    <h6>{{ trans('sizes.sizes') }}</h6>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <i class="icon-check danger font-large-2 float-right"></i>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                    --}}{{-- <div class="progress progress-sm mt-1 mb-0 box-shadow-2">--}}
{{--                                        <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                    </div> --}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-3 col-lg-6 col-12">--}}
{{--                        <div class="card pull-up">--}}
{{--                            <div class="card-content">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="media d-flex">--}}
{{--                                        @if (auth()->user()->hasPermission('read_service'))--}}
{{--                                            <a href="{{ route('admin.services.index') }}">--}}
{{--                                                <div class="media-body text-left">--}}
{{--                                                    <h3 class="warning">{{ App\Models\Service::count() }}</h3>--}}
{{--                                                    <h6>{{ __('service.service') }}</h6>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <i class="icon-pie-chart warning font-large-2 float-right"></i>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                    --}}{{-- <div class="progress progress-sm mt-1 mb-0 box-shadow-2">--}}
{{--                                        <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                    </div> --}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-xl-3 col-lg-6 col-12">--}}
{{--                        <div class="card pull-up">--}}
{{--                            <div class="card-content">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="media d-flex">--}}
{{--                                        @if (auth()->user()->hasPermission('read_mediationorder'))--}}
{{--                                            <a href="{{ route('admin.MediationRequest.index') }}">--}}
{{--                                                <div class="media-body text-left">--}}
{{--                                                    <h3 class="info">{{ App\Models\MediationOrder::count() }}</h3>--}}
{{--                                                    <h6>{{ trans('mediation_request.mediation_requests') }}</h6>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <i class="icon-rocket success font-large-2 float-right"></i>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                    --}}{{-- <div class="progress progress-sm mt-1 mb-0 box-shadow-2">--}}
{{--                                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                    </div> --}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-3 col-lg-6 col-12">--}}
{{--                        <div class="card pull-up">--}}
{{--                            <div class="card-content">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="media d-flex">--}}
{{--                                        @if (auth()->user()->hasPermission('read_ads'))--}}
{{--                                            <a href="{{ route('admin.ads.index') }}">--}}
{{--                                                <div class="media-body text-left">--}}
{{--                                                    <h3 class="warning">{{ App\Models\Ad::count() }}</h3>--}}
{{--                                                    <h6>{{ trans('ads.ads') }}</h6>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <i class="icon-paper-plane warning font-large-2 float-right"></i>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                    --}}{{-- <div class="progress progress-sm mt-1 mb-0 box-shadow-2">--}}
{{--                                        <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                    </div> --}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-3 col-lg-6 col-12">--}}
{{--                        <div class="card pull-up">--}}
{{--                            <div class="card-content">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="media d-flex">--}}
{{--                                        @if (auth()->user()->hasPermission('read_plans'))--}}
{{--                                            <a href="{{ route('admin.plans.index') }}">--}}
{{--                                                <div class="media-body text-left">--}}
{{--                                                    <h3 class="success">{{ App\Models\Plan::count() }}</h3>--}}
{{--                                                    <h6>{{ trans('plans.plans') }}</h6>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <i class="icon-book-open info font-large-2 float-right"></i>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                    --}}{{-- <div class="progress progress-sm mt-1 mb-0 box-shadow-2">--}}
{{--                                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                    </div> --}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-3 col-lg-6 col-12">--}}
{{--                        <div class="card pull-up">--}}
{{--                            <div class="card-content">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="media d-flex">--}}
{{--                                        @if (auth()->user()->hasPermission('read_translationServices'))--}}
{{--                                            <a href="{{ route('admin.translationServices.index') }}">--}}
{{--                                                <div class="media-body text-left">--}}
{{--                                                    <h3 class="danger">{{ App\Models\TranslationServices::count() }}</h3>--}}
{{--                                                    <h6>{{ trans('translationServices.translationServices') }}</h6>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <i class="icon-share danger font-large-2 float-right"></i>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                    --}}{{-- <div class="progress progress-sm mt-1 mb-0 box-shadow-2">--}}
{{--                                        <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                    </div> --}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-xl-3 col-lg-6 col-12">--}}
{{--                        <div class="card pull-up">--}}
{{--                            <div class="card-content">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="media d-flex">--}}
{{--                                        @if (auth()->user()->hasPermission('read_chats'))--}}
{{--                                            <a href="{{ route('admin.chats.index') }}">--}}
{{--                                                <div class="media-body text-left">--}}
{{--                                                    <h3 class="info">{{ App\Models\SupportChat::count() }}</h3>--}}
{{--                                                    <h6>{{ trans('chats.chats') }}</h6>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <i class="icon-speech success font-large-2 float-right"></i>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection
