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
</style>
@endsection

@section('page_header')
    <div class="page-header">
        <div class="page-title">
            <h3>About Section</h3>
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
                    <li><a href="#">Home</a></li>
                    <li class="active"><a href="#">About Section</a> </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
        <form class="general-info" method="POST" action="{{ route('home.about.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="info">
                <h6 class="mt-4">About Section Information</h6>
                <div class="row">
                    <div class="col-lg-4 col-md-5 d-flex align-items-center justify-content-center" style="border-right: 1px solid #ececec;">
                        <div class="upload border-0">
                            <input type="file" name="image" id="input-file-max-fs" class="dropify" data-default-file="{{ $about && $about->image ? asset('uploads/'.$about->image) : asset('assets/admin/assets/img/user-avatar.jpg')}}" data-max-file-size="2M" />
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
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="full_name-ar">Arabic Full Name</label>
                                        <input type="text" name="full_name_ar" value="{{$about &&  $about->full_name_ar ? $about->full_name_ar : '' }}" class="form-control {{ $errors->has('full_name_ar') ? 'mb-1' : 'mb-4'}}" id="full_name-ar">
                                        @error('full_name_ar')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="full_name-en">English Full Name</label>
                                        <input type="text" name="full_name_en" value="{{ $about && $about->full_name_en ? $about->full_name_en : '' }}" class="form-control {{ $errors->has('full_name_en') ? 'mb-1' : 'mb-4'}}" id="full_name-en">
                                        @error('full_name_en')
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
                                        <label for="sub_title-ar">Arabic Sub Title</label>
                                        <input type="text" name="sub_title_ar" value="{{$about &&  $about->sub_title_ar ? $about->sub_title_ar : '' }}" class="form-control {{ $errors->has('sub_title_ar') ? 'mb-1' : 'mb-4'}}" id="sub_title-ar">
                                        @error('sub_title_ar')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="sub_title-en">English Sub Title</label>
                                        <input type="text" name="sub_title_en" value="{{ $about && $about->sub_title_en ? $about->sub_title_en : '' }}" class="form-control {{ $errors->has('sub_title_en') ? 'mb-1' : 'mb-4'}}" id="sub_title-en">
                                        @error('sub_title_en')
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
                                        <label for="job-ar">Arabic Job</label>
                                        <input type="text" name="job_ar" value="{{ $about && $about->job_ar ? $about->job_ar : '' }}" class="form-control {{ $errors->has('job_ar') ? 'mb-1' : 'mb-4'}}" id="job-ar">
                                        @error('job_ar')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="job-en">English job</label>
                                        <input type="text" name="job_en" value="{{ $about && $about->job_en ? $about->job_en : '' }}" class="form-control {{ $errors->has('job_en') ? 'mb-1' : 'mb-4'}}" id="job-en">
                                        @error('job_en')
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
                                        <label for="description-ar">Arabic Description</label>
                                        <textarea type="text" name="description_ar" class="form-control {{ $errors->has('description_ar') ? 'mb-1' : 'mb-4'}}" id="description-ar" rows="6">{{ $about && $about->description_ar ? $about->description_ar : '' }}</textarea>
                                        @error('description_ar')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="description-en">English Description</label>
                                        <textarea type="text" name="description_en" class="form-control {{ $errors->has('description_en') ? 'mb-1' : 'mb-4'}}" id="description-en" rows="6">{{ $about && $about->description_en ? $about->description_en : '' }}</textarea>
                                        @error('description_en')
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
                                        <label for="button-ar">Arabic Button</label>
                                        <input type="text" name="button_ar" value="{{ $about && $about->button_ar ? $about->button_ar : '' }}" class="form-control {{ $errors->has('button_ar') ? 'mb-1' : 'mb-4'}}" id="button-ar">
                                        @error('button_ar')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="button-en">English Button</label>
                                        <input type="text" name="button_en" value="{{ $about && $about->button_en ? $about->button_en : '' }}" class="form-control {{ $errors->has('button_en') ? 'mb-1' : 'mb-4'}}" id="button-en">
                                        @error('button_en')
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
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option {{ $about && $about->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                            <option {{ $about && $about->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
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
