@extends('layouts.admin')

@section('page_css')
<link href="{{ asset('assets/admin/assets/css/default-dashboard/style.css')}}" rel="stylesheet" type="text/css" />
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
                            <p class="widget-text mb-0">Sales</p>
                            <p class="widget-numeric-value">98,225</p>
                        </div>
                    </div>
                    <p class="widget-total-stats mt-2">94% New Sales</p>
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
                            <p class="widget-text mb-0">Orders</p>
                            <p class="widget-numeric-value">24,017</p>
                        </div>
                    </div>
                    <p class="widget-total-stats mt-2">552 New Orders</p>
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
                            <p class="widget-text mb-0">Customers</p>
                            <p class="widget-numeric-value">92,251</p>
                        </div>
                    </div>
                    <p class="widget-total-stats mt-2">390 New Customers</p>
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
                            <p class="widget-text mb-0">Income</p>
                            <p class="widget-numeric-value">9.5 M</p>
                        </div>
                    </div>
                    <p class="widget-total-stats mt-2">$2.1 M This Week</p>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-6 col-12 layout-spacing">
            <div class="widget-content-area chat-messages p-0  br-4">

                <div class="chat-container">
                    <div class="chat-header">
                        <div class="media">
                            <i class="flaticon-mail-fill icon mr-4"></i>
                            <div class="media-body">
                                <h6 class="">Message</h6>
                                <p class="mb-0">3 Unread Message</p>
                            </div>
                            <div class="float-right">
                                <i class="flaticon-refresh-1 js-refresh mr-1"></i>
                                <div class="dropdown custom-dropdown d-inline-block">
                                    <a class="dropdown-toggle pl-0" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="flaticon-dots"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="javascript:void(0);">Account</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Profile</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Settings</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="chat-body reload-widget-area">
                        <div class="mCustomScrollbar message-scroll" data-mcs-theme="minimal-dark">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <img src="{{asset('assets/admin/assets/img/90x90.jpg')}}" class="rounded-circle mr-4" alt="user">
                                                    <div class="media-body">
                                                        <h6 class="usr-name">Andy King</h6>
                                                        <p class="message">Hey, where have you been?</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right"><p class="meta-time">5 min</p></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <img src="{{asset('assets/admin/assets/img/90x90.jpg')}}" class="rounded-circle mr-4" alt="user">
                                                    <div class="media-body">
                                                        <h6 class="usr-name">Shaun Park</h6>
                                                        <p class="message">What up man? Good Morning</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right"><p class="meta-time">7 min</p></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <img src="{{asset('assets/admin/assets/img/90x90.jpg')}}" class="rounded-circle mr-4" alt="user">
                                                    <div class="media-body">
                                                        <h6 class="usr-name">Nia Hillyer</h6>
                                                        <p class="message">Hey, why are you not eating anything?</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right"><p class="meta-time">11 min</p></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <img src="{{asset('assets/admin/assets/img/90x90.jpg')}}" class="rounded-circle mr-4" alt="user">
                                                    <div class="media-body">
                                                        <h6 class="usr-name">Mary McDonald</h6>
                                                        <p class="message">I never said that for sure</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right"><p class="meta-time">20 min</p></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <img src="{{asset('assets/admin/assets/img/90x90.jpg')}}" class="rounded-circle mr-4" alt="user">
                                                    <div class="media-body">
                                                        <h6 class="usr-name">Lisa Doe</h6>
                                                        <p class="message">That's not what I heard from Sammy</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right"><p class="meta-time">25 min</p></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <img src="{{asset('assets/admin/assets/img/90x90.jpg')}}" class="rounded-circle mr-4" alt="user">
                                                    <div class="media-body">
                                                        <h6 class="usr-name">Alma Clarke</h6>
                                                        <p class="message">Good Morning Friends</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right"><p class="meta-time">33 min</p></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="text-center show-all-msg p-4">
                            <a href="#">All messages</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget-content-area card-widget p-0  br-4">
                <div class="card-1 br-4">
                    <div class="d-flex justify-content-between mb-5">
                        <p class="card-title">Team Meeting</p>
                        <p class="meta-time">12:30 - 2:30 PM</p>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>

                        <div class="col-md-12 text-center mt-sm-3">
                            <button class="btn btn-outline-default btn-rounded">View Details</button>
                        </div>
                    </div>

                    <ul class="list-inline badge-collapsed-img badge-tooltip mt-5 mb-0 text-right mr-3">
                        <li class="list-inline-item chat-online-usr">
                            <img data-original-title="Alma Clarke" alt="admin-profile" src="{{asset('assets/admin/assets/img/90x90.jpg')}}" class="ml-0 bs-tooltip">
                        </li>
                        <li class="list-inline-item chat-online-usr">
                            <img data-original-title="Alan Green" alt="admin-profile" src="{{asset('assets/admin/assets/img/90x90.jpg')}}" class="bs-tooltip">
                        </li>
                        <li class="list-inline-item chat-online-usr">
                            <img data-original-title="Daisy Anderson" alt="admin-profile" src="{{asset('assets/admin/assets/img/90x90.jpg')}}" class="bs-tooltip">
                        </li>
                        <li class="list-inline-item chat-online-usr">
                            <img data-original-title="Judy Holmes" alt="admin-profile" src="{{asset('assets/admin/assets/img/90x90.jpg')}}" class="bs-tooltip">
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="statbox widget box order-summary">
                <div class="widget-header ">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Order Summary</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area ">
                    <p class="card-title pl-2 mb-0 mt-1">Total Balance</p>
                    <div class="d-flex justify-content-between mt-4">
                        <p class="t-amount mb-2">168,500</p>
                        <p class="order-rate mt-auto">20% <i class="flaticon-double-check ml-2"></i></p>
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-6 mb-sm-4 mb-2">
                            <div class="media processed">
                                <i class="flaticon-cart-bag icon mr-2"></i>
                                <div class="media-body">
                                    <p class="mt-1">Processed</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-sm-4 mb-2">
                            <div class="progress progress-md">
                            <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-sm-4 mb-2">
                            <div class="media pending">
                                <i class="flaticon-danger-2 icon mr-2"></i>
                                <div class="media-body">
                                    <p class="mt-1">Pending</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-sm-4 mb-2">
                            <div class="progress progress-md">
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-sm-4 mb-2">
                            <div class="media delivered">
                                <i class="flaticon-gift icon mr-2"></i>
                                <div class="media-body">
                                    <p class="mt-1">Delivered</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-sm-4 mb-2">
                            <div class="progress progress-md">
                            <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
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
                            <h4>New Products</h4>
                        </div>
                    </div>
                </div>

                <div class="widget-content-area ">

                    <div class="table-responsive new-products">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="form-check-column text-center">
                                        <label  for="checkAll" class="new-control new-checkbox new-checkbox-rounded checkbox-primary pb-2">
                                        <input type="checkbox" id="checkAll" class="new-control-input">
                                        <span class="new-control-indicator mt-2"></span><span class="invisible">s</span>
                                        </label>
                                    </th>
                                    <th>Product</th>
                                    <th>Type</th>
                                    <th>SKU</th>
                                    <th class="text-center">Quantity</th>
                                    <th>Image</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="form-check-column text-center">
                                        <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary pb-2">
                                        <input type="checkbox" class="new-control-input chkbox">
                                        <span class="new-control-indicator mt-2"></span><span class="invisible">s</span>
                                        </label>
                                    </td>
                                    <td>Camera</td>
                                    <td><span class="badge badge-info badge-pill">Simple</span></td>
                                    <td>#0001</td>
                                    <td class="text-center">1</td>
                                    <td>
                                        <img src="{{asset('assets/admin/assets/img/90x90.jpg')}}" class="img-fluid" alt="img-1" style="border-color: #3862f5;">
                                    </td>
                                    <td class="text-center">$848.95</td>
                                    <td class="text-center">
                                        <div class="toolbar">
                                            <div class="toolbar-toggle">...</div>
                                            <ul class="toolbar-dropdown animated fadeInUp table-controls list-inline">
                                                <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="View"><i class="flaticon-view-3"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="Edit"><i class="flaticon-edit-5"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="Remove"><i class="flaticon-delete-6"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="form-check-column text-center">
                                        <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary pb-2">
                                        <input type="checkbox" class="new-control-input chkbox">
                                        <span class="new-control-indicator mt-2"></span><span class="invisible">s</span>
                                        </label>
                                    </td>
                                    <td>Mobile</td>
                                    <td><span class="badge badge-info badge-pill">Simple</span></td>
                                    <td>#0002</td>
                                    <td class="text-center">1</td>
                                    <td>
                                        <img src="{{asset('assets/admin/assets/img/90x90.jpg')}}" class="img-fluid" alt="img-1" style="border-color: #07e0c4;">
                                    </td>
                                    <td class="text-center">$529.95</td>
                                    <td class="text-center">
                                        <div class="toolbar">
                                            <div class="toolbar-toggle">...</div>
                                            <ul class="toolbar-dropdown animated fadeInUp table-controls list-inline">
                                                <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="View"><i class="flaticon-view-3"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="Edit"><i class="flaticon-edit-5"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="Remove"><i class="flaticon-delete-6"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="form-check-column text-center">
                                        <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary pb-2">
                                        <input type="checkbox" class="new-control-input chkbox">
                                        <span class="new-control-indicator mt-2"></span><span class="invisible">s</span>
                                        </label>
                                    </td>
                                    <td>Windows 10</td>
                                    <td><span class="badge badge-success badge-pill">Digital</span></td>
                                    <td>#0003</td>
                                    <td class="text-center">3</td>
                                    <td>
                                        <img src="{{asset('assets/admin/assets/img/90x90.jpg')}}" class="img-fluid" alt="img-1" style="border-color: #00b1f4;">
                                    </td>
                                    <td class="text-center">$1584.00</td>
                                    <td class="text-center">
                                        <div class="toolbar">
                                            <div class="toolbar-toggle">...</div>
                                            <ul class="toolbar-dropdown animated fadeInUp table-controls list-inline">
                                                <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="View"><i class="flaticon-view-3"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="Edit"><i class="flaticon-edit-5"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="Remove"><i class="flaticon-delete-6"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="form-check-column text-center">
                                        <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary pb-2">
                                        <input type="checkbox" class="new-control-input chkbox">
                                        <span class="new-control-indicator mt-2"></span><span class="invisible">s</span>
                                        </label>
                                    </td>
                                    <td>Watch</td>
                                    <td><span class="badge badge-info badge-pill">Simple</span></td>
                                    <td>#0004</td>
                                    <td class="text-center">5</td>
                                    <td>
                                        <img src="{{asset('assets/admin/assets/img/90x90.jpg')}}" class="img-fluid" alt="img-1" style="border-color: #f8538d;">
                                    </td>
                                    <td class="text-center">$595.99</td>
                                    <td class="text-center">
                                        <div class="toolbar">
                                            <div class="toolbar-toggle">...</div>
                                            <ul class="toolbar-dropdown animated fadeInUp table-controls list-inline">
                                                <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="View"><i class="flaticon-view-3"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="Edit"><i class="flaticon-edit-5"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="Remove"><i class="flaticon-delete-6"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="form-check-column text-center">
                                        <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary pb-2">
                                        <input type="checkbox" class="new-control-input chkbox">
                                        <span class="new-control-indicator mt-2"></span><span class="invisible">s</span>
                                        </label>
                                    </td>
                                    <td>Drone</td>
                                    <td><span class="badge badge-info badge-pill">Simple</span></td>
                                    <td>#0005</td>
                                    <td class="text-center">1</td>                                                <td>
                                        <img src="{{asset('assets/admin/assets/img/90x90.jpg')}}" class="img-fluid" alt="img-1" style="border-color: #ffbb44;">
                                    </td>
                                    <td class="text-center">$58.00</td>
                                    <td class="text-center">
                                        <div class="toolbar">
                                            <div class="toolbar-toggle">...</div>
                                            <ul class="toolbar-dropdown animated fadeInUp table-controls list-inline">
                                                <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="View"><i class="flaticon-view-3"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="Edit"><i class="flaticon-edit-5"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="Remove"><i class="flaticon-delete-6"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="form-check-column text-center">
                                        <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary pb-2">
                                        <input type="checkbox" class="new-control-input chkbox">
                                        <span class="new-control-indicator mt-2"></span><span class="invisible">s</span>
                                        </label>
                                    </td>
                                    <td>Sunglasses</td>
                                    <td><span class="badge badge-secondary badge-pill">Bundled</span></td>
                                    <td>#0006</td>
                                    <td class="text-center">6</td>
                                    <td>
                                        <img src="{{asset('assets/admin/assets/img/90x90.jpg')}}" class="img-fluid" alt="img-1" style="border-color: #25d5e4;">
                                    </td>
                                    <td class="text-center">$123.00</td>
                                    <td class="text-center">
                                        <div class="toolbar">
                                            <div class="toolbar-toggle">...</div>
                                            <ul class="toolbar-dropdown animated fadeInUp table-controls list-inline">
                                                <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="View"><i class="flaticon-view-3"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="Edit"><i class="flaticon-edit-5"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="Remove"><i class="flaticon-delete-6"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
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