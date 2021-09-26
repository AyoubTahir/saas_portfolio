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
                            <i class="flaticon-line-chart"></i>
                        </div>
                        <div class="media-body text-right">
                            <p class="widget-text mb-0">Total Portfolio Views</p>
                            <p class="widget-numeric-value">9</p>
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
                            <i class="flaticon-cart-bag"></i>
                        </div>
                        <div class="media-body text-right">
                            <p class="widget-text mb-0">Total Projects Views</p>
                            <p class="widget-numeric-value">5</p>
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
                            <i class="flaticon-user-11"></i>
                        </div>
                        <div class="media-body text-right">
                            <p class="widget-text mb-0">Total Projects</p>
                            <p class="widget-numeric-value">12</p>
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
                            <i class="flaticon-money"></i>
                        </div>
                        <div class="media-body text-right">
                            <p class="widget-text mb-0">Total Categories</p>
                            <p class="widget-numeric-value">0</p>
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
                                <tr>
                                    <td>
                                        <img src="{{asset('assets/admin/assets/img/90x90.jpg')}}" class="img-fluid" alt="img-1" style="border-color: #3862f5;">
                                    </td>
                                    <td>Camera</td>
                                    <td>#0001</td>
                                    <td><span class="badge badge-info badge-pill">Simple</span></td>
                                    <td class="text-center">1</td>
                                    <td class="text-center">Google</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-section">
                        <ul class="pagination pagination-style-1 pagination-rounded justify-content-end mt-3 mb-3">
                            <li><a href="javascript:void(0);">«</a></li>
                            <li><a href="javascript:void(0);">1</a></li>
                            <li><a href="javascript:void(0);">2</a></li>
                            <li><a href="javascript:void(0);">3</a></li>
                            <li><a href="javascript:void(0);">4</a></li>
                            <li><a href="javascript:void(0);">5</a></li>
                            <li><a href="javascript:void(0);">»</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('page_scripts')

@endpush
