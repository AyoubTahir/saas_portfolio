@extends('layouts.admin')

@section('page_css')
<!--  BEGIN CUSTOM STYLE FILE  -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/plugins/dropify/dropify.min.css')}}">
<link href="{{asset('assets/admin/assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
<!--  END CUSTOM STYLE FILE  -->
<style>
    .hero-bg .dropify-wrapper{
        width: auto !important;
        height: 300px !important;
        border: 2px solid rgb(185, 185, 185) !important;

    }
    .hero-bg .dropify-preview{
        background: gainsboro !important;
    }
    label,p{
        color: rgb(66, 66, 66) !important;
    }
    .general-info .info .dropify-wrapper {
        width: 126px !important;
        height: 126px !important;
    }
</style>
@endsection

@section('page_header')
    <div class="page-header">
        <div class="page-title">
            <h3>Settings</h3>
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
                    <li><a href="#">Home</a></li>
                    <li class="active"><a href="#">Settings</a> </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
        <form class="general-info" method="POST" action="{{ route('settings.profile.update') }}" enctype="multipart/form-data">
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

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
        <form class="general-info" method="POST" action="{{ route('settings.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="info">
                <h6 class="mt-4">Update Website Settings</h6>
                <div class="row">
                    <div class="col-lg-3 col-md-3 d-flex align-items-center justify-content-center" style="border-right: 1px solid #ececec;">
                        <div class="upload border-0">
                            <input type="file" name="light_logo_ar" id="input-file-max-fs" class="dropify" data-default-file="{{ $setting && $setting->light_logo_ar ? asset('uploads/'.$setting->light_logo_ar) : asset('assets/admin/assets/img/user-avatar.jpg')}}" data-max-file-size="2M" />
                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>Ar Light Logo</p>
                            @error('light_logo_ar')
                                <span class="invalid-feedback" style="display: inline-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 d-flex align-items-center justify-content-center" style="border-right: 1px solid #ececec;">
                        <div class="upload border-0">
                            <input type="file" name="light_logo_en" id="input-file-max-fs" class="dropify" data-default-file="{{ $setting && $setting->light_logo_en ? asset('uploads/'.$setting->light_logo_en) : asset('assets/admin/assets/img/user-avatar.jpg')}}" data-max-file-size="2M" />
                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>En Light Logo</p>
                            @error('light_logo_en')
                                <span class="invalid-feedback" style="display: inline-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 d-flex align-items-center justify-content-center" style="border-right: 1px solid #ececec;">
                        <div class="upload border-0">
                            <input type="file" name="dark_logo_ar" id="input-file-max-fs" class="dropify" data-default-file="{{ $setting && $setting->dark_logo_ar ? asset('uploads/'.$setting->dark_logo_ar) : asset('assets/admin/assets/img/user-avatar.jpg')}}" data-max-file-size="2M" />
                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>Ar Dark Logo</p>
                            @error('dark_logo_ar')
                                <span class="invalid-feedback" style="display: inline-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 d-flex align-items-center justify-content-center" style="border-right: 1px solid #ececec;">
                        <div class="upload border-0">
                            <input type="file" name="dark_logo_en" id="input-file-max-fs" class="dropify" data-default-file="{{ $setting && $setting->dark_logo_en ? asset('uploads/'.$setting->dark_logo_en) : asset('assets/admin/assets/img/user-avatar.jpg')}}" data-max-file-size="2M" />
                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>En Dark Logo</p>
                            @error('dark_logo_en')
                                <span class="invalid-feedback" style="display: inline-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-4">
                        <div class="form">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="website_name-ar">Arabic Website Name</label>
                                        <input type="text" name="website_name_ar" value="{{$setting &&  $setting->website_name_ar ? $setting->website_name_ar : '' }}" class="form-control {{ $errors->has('website_name_ar') ? 'mb-1' : 'mb-4'}}" id="website_name-ar">
                                        @error('website_name_ar')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="website_name-en">English Website Name</label>
                                        <input type="text" name="website_name_en" value="{{ $setting && $setting->website_name_en ? $setting->website_name_en : '' }}" class="form-control {{ $errors->has('website_name_en') ? 'mb-1' : 'mb-4'}}" id="website_name-en">
                                        @error('website_name_en')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="footer_desc-ar">Arabic footer Description</label>
                                        <input type="text" name="footer_desc_ar" value="{{ $setting && $setting->footer_desc_ar ? $setting->footer_desc_ar : '' }}" class="form-control {{ $errors->has('footer_desc_ar') ? 'mb-1' : 'mb-4'}}" id="footer_desc-ar">
                                        @error('footer_desc_ar')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="footer_desc-en">English footer Description</label>
                                        <input type="text" name="footer_desc_en" value="{{ $setting && $setting->footer_desc_en ? $setting->footer_desc_en : '' }}" class="form-control {{ $errors->has('footer_desc_en') ? 'mb-1' : 'mb-4'}}" id="footer_desc-en">
                                        @error('footer_desc_en')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" name="facebook" value="{{ $setting && $setting->facebook ? $setting->facebook : '' }}" class="form-control {{ $errors->has('facebook') ? 'mb-1' : 'mb-4'}}" id="facebook">
                                        @error('facebook')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" name="instagram" value="{{ $setting && $setting->instagram ? $setting->instagram : '' }}" class="form-control {{ $errors->has('instagram') ? 'mb-1' : 'mb-4'}}" id="instagram">
                                        @error('instagram')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="twiter">Twiter</label>
                                        <input type="text" name="twiter" value="{{ $setting && $setting->twiter ? $setting->twiter : '' }}" class="form-control {{ $errors->has('twiter') ? 'mb-1' : 'mb-4'}}" id="twiter">
                                        @error('twiter')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="linkedin">Linkedin</label>
                                        <input type="text" name="linkedin" value="{{ $setting && $setting->linkedin ? $setting->linkedin : '' }}" class="form-control {{ $errors->has('linkedin') ? 'mb-1' : 'mb-4'}}" id="linkedin">
                                        @error('linkedin')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="theme_mode">Theme Mode</label>
                                        <select class="form-control" name="theme_mode" id="theme_mode">
                                            <option {{ $setting && $setting->theme_mode == 1 ? 'selected' : '' }} value="1">Light</option>
                                            <option {{ $setting && $setting->theme_mode == 0 ? 'selected' : '' }} value="0">Dark</option>
                                        </select>
                                        @error('theme_mode')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="website_status">Website Status</label>
                                        <select class="form-control" name="website_status" id="website_status">
                                            <option {{ $setting && $setting->website_status == 1 ? 'selected' : '' }} value="1">Active</option>
                                            <option {{ $setting && $setting->website_status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                        </select>
                                        @error('website_status')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
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
