@extends('layouts.admin')

@section('page_css')
<!--  BEGIN CUSTOM STYLE FILE  -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/plugins/dropify/dropify.min.css')}}">
<link href="{{asset('assets/admin/assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
<!--  END CUSTOM STYLE FILE  -->
@endsection

@section('page_header')
    <div class="page-header">
        <div class="page-title">
            <h3>New User</h3>
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
                    <li><a href="#">Users</a></li>
                    <li class="active"><a href="#">Add New User</a> </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
        <form class="general-info" method="POST" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="info">
                <h6 class="mt-4">User Information</h6>
                <div class="row">
                    <div class="col-lg-4 col-md-5 d-flex align-items-center justify-content-center" style="border-right: 1px solid #ececec;">
                        <div class="upload border-0">
                            <input type="file" name="image" id="input-file-max-fs" class="dropify" data-default-file="{{asset('uploads/' . $user->image)}}" data-max-file-size="2M" />
                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                            @error('image')
                                <span class="invalid-feedback" style="display: inline-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 mt-md-0 mt-4">
                        <div class="form">
                            <div class="form-group">
                                <label for="firstName">Full Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control {{ $errors->has('name') ? 'mb-1' : 'mb-4'}}" id="firstName">
                                @error('name')
                                    <span class="invalid-feedback" style="display: inline-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="lastName">Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control {{ $errors->has('email') ? 'mb-1' : 'mb-4'}}" id="lastName">
                                @error('email')
                                    <span class="invalid-feedback" style="display: inline-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="profession">Password</label>
                                <input type="text" name="password" class="form-control {{ $errors->has('password') ? 'mb-1' : 'mb-4'}}" id="profession">
                                @error('password')
                                    <span class="invalid-feedback" style="display: inline-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="country">Status</label>
                                <select class="form-control" name="status" id="country">
                                    <option {{ $user->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ $user->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" style="display: inline-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="save-info">
                <div class="row">
                    <div class="col-md-11 mx-auto">
                        <button class="btn btn-gradient-warning mb-4 float-right btn-rounded">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection


@push('page_scripts')
<script src="{{asset('assets/admin/plugins/dropify/dropify.min.js')}}"></script>
<script>
    $('.dropify').dropify({
        messages: { 'default': 'Click to Upload or Drag n Drop', 'remove':  '<i class="flaticon-close-fill"></i>', 'replace': 'Upload or Drag n Drop' }
    });
</script>
@endpush
