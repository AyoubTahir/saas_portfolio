@extends('layouts.admin')

@section('page_css')
<link href="{{ asset('assets/admin/assets/css/default-dashboard/style.css')}}" rel="stylesheet" type="text/css" />
<style>
    .data-widgets .widget .media .icon {
        flex: 0 !important;
    }
</style>
@endsection

@section('page_header')

    <div class="page-header">
        <div class="page-title">
            <h3>Dashboard</h3>
        </div>
    </div>

@endsection

@section('content')

    <div class="row layout-spacing ">

        <div class="col-xl-3 mb-xl-0 col-lg-6 mb-4 col-md-6 col-sm-6">
            <div class="widget-content-area  data-widgets br-4">
                <div class="widget  t-sales-widget">
                    <div class="media">
                        <div class="icon ml-2">
                            <i class="flaticon-view"></i>
                        </div>
                        <div class="media-body text-right">
                            <p class="widget-text mb-0">Total Portfolio Views</p>
                            <p class="widget-numeric-value">{{ Auth::user()->portfolio->views }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 mb-xl-0 col-lg-6 mb-4 col-md-6 col-sm-6">
            <div class="widget-content-area  data-widgets br-4">
                <div class="widget  t-order-widget">
                    <div class="media">
                        <div class="icon ml-2">
                            <i class="flaticon-view"></i>
                        </div>
                        <div class="media-body text-right">
                            <p class="widget-text mb-0">Total Projects Views</p>
                            <p class="widget-numeric-value">{{ Auth::user()->projects->sum('views') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-sm-0 mb-4">
            <div class="widget-content-area  data-widgets br-4">
                <div class="widget  t-customer-widget">
                    <div class="media">
                        <div class="icon ml-2">
                            <i class="flaticon-idea-bulb"></i>
                        </div>
                        <div class="media-body text-right">
                            <p class="widget-text mb-0">Total Projects</p>
                            <p class="widget-numeric-value">{{ Auth::user()->projects->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">

            <div class="widget-content-area  data-widgets br-4">
                <div class="widget  t-income-widget">
                    <div class="media">
                        <div class="icon ml-2">
                            <i class="flaticon-package"></i>
                        </div>
                        <div class="media-body text-right">
                            <p class="widget-text mb-0">Total Categories</p>
                            <p class="widget-numeric-value">{{ Auth::user()->categories->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="statbox widget box">
                <div class="widget-header ">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Project</h4>
                        </div>
                    </div>
                </div>

                <div class="widget-content-area ">

                    <div class="table-responsive new-products">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Projects</th>
                                    <th>Categories</th>
                                    <th>Levels</th>
                                    <th class="text-center">Views</th>
                                    <th class="text-center">WebSites</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (Auth::user()->projects)
                                    @foreach (Auth::user()->projects as $project )
                                        <tr>
                                            <td>
                                                <img src="{{asset('uploads/'.$project->thumbnail)}}" class="img-fluid" alt="img-1" style="border-color: #3862f5;">
                                            </td>
                                            <td>{{ $project->title_en }} - {{ $project->title_ar }}</td>
                                            <td>{{ $project->category->name_en }} - {{ $project->category->name_ar }}</td>
                                            @if ($project->views <= 10)
                                                {{$badg = 'info'}}
                                                {{$lvl = 'Low'}}
                                            @elseif ($project->views > 10 && $project->views <= 50 )
                                                {{$badg = 'success'}}
                                                {{$lvl = 'Medium'}}
                                            @else
                                                {{$badg = 'danger'}}
                                                {{$lvl = 'Hot'}}
                                            @endif
                                            <td><span class="badge badge-{{$badg}} badge-pill">{{$lvl}}</span></td>
                                            <td class="text-center">{{ $project->views }}</td>
                                            <td class="text-center"><a href="{{ $project->website }}" target="_blank">Visit</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('page_scripts')

@endpush
