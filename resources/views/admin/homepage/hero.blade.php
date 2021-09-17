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
            <h3>Hero Section</h3>
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
                    <li><a href="#">Home</a></li>
                    <li class="active"><a href="#">Hero Section</a> </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
        <form class="general-info" method="POST" action="{{ route('home.hero.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="info">
                <h6 class="mt-4">Hero Section Background</h6>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="upload border-0 hero-bg">
                            <input type="file" name="cover" id="input-file-max-fs" class="dropify" data-default-file="{{ $hero && $hero->cover ? asset('uploads/'.$hero->cover) : asset('assets/images/home/02.jpg') }}" data-max-file-size="2M" />
                            <p class="mt-2 text-center"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                            @error('cover')
                                <span class="invalid-feedback" style="display: inline-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <h6 class="mt-4">Hero Section Information</h6>
                <div class="row">
                    <div class="col-lg-4 col-md-5 d-flex align-items-center justify-content-center" style="border-right: 1px solid #ececec;">
                        <div class="upload border-0">
                            <input type="file" name="image" id="input-file-max-fs" class="dropify" data-default-file="{{ $hero && $hero->image ? asset('uploads/'.$hero->image) : asset('assets/admin/assets/img/user-avatar.jpg')}}" data-max-file-size="2M" />
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
                                        <label for="title-ar">Arabic Title</label>
                                        <input type="text" name="title_ar" value="{{$hero &&  $hero->title_ar ? $hero->title_ar : '' }}" class="form-control {{ $errors->has('title_ar') ? 'mb-1' : 'mb-4'}}" id="title-ar">
                                        @error('title_ar')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="title-en">English Title</label>
                                        <input type="text" name="title_en" value="{{ $hero && $hero->title_en ? $hero->title_en : '' }}" class="form-control {{ $errors->has('title_en') ? 'mb-1' : 'mb-4'}}" id="title-en">
                                        @error('title_en')
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
                                        <input type="text" name="job_ar" value="{{ $hero && $hero->job_ar ? $hero->job_ar : '' }}" class="form-control {{ $errors->has('job_ar') ? 'mb-1' : 'mb-4'}}" id="job-ar">
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
                                        <input type="text" name="job_en" value="{{ $hero && $hero->job_en ? $hero->job_en : '' }}" class="form-control {{ $errors->has('job_en') ? 'mb-1' : 'mb-4'}}" id="job-en">
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
                                        <textarea type="text" name="description_ar" class="form-control {{ $errors->has('description_ar') ? 'mb-1' : 'mb-4'}}" id="description-ar">{{ $hero && $hero->description_ar ? $hero->description_ar : '' }}</textarea>
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
                                        <textarea type="text" name="description_en" class="form-control {{ $errors->has('description_en') ? 'mb-1' : 'mb-4'}}" id="description-en">{{ $hero && $hero->description_en ? $hero->description_en : '' }}</textarea>
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
                                        <input type="text" name="button_ar" value="{{ $hero && $hero->button_ar ? $hero->button_ar : '' }}" class="form-control {{ $errors->has('button_ar') ? 'mb-1' : 'mb-4'}}" id="button-ar">
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
                                        <input type="text" name="button_en" value="{{ $hero && $hero->button_en ? $hero->button_en : '' }}" class="form-control {{ $errors->has('button_en') ? 'mb-1' : 'mb-4'}}" id="button-en">
                                        @error('button_en')
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
