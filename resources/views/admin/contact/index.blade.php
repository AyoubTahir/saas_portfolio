@extends('layouts.admin')

@section('page_css')
<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="{{asset('assets/admin/assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
<!--  END CUSTOM STYLE FILE  -->
@endsection

@section('page_header')
    <div class="page-header">
        <div class="page-title">
            <h3>Contact</h3>
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
                    <li><a href="#">Home</a></li>
                    <li class="active"><a href="#">Contact</a> </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
        <form class="general-info" method="POST" action="{{ route('contact.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="info">
                <h6 class="mt-4">Update Contact Info</h6>
                <div class="row">
                    <div class="col-lg-12 mt-4">
                        <div class="form">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="title-ar">Arabic Title</label>
                                        <input type="text" name="title_ar" value="{{$contact &&  $contact->title_ar ? $contact->title_ar : '' }}" class="form-control {{ $errors->has('title_ar') ? 'mb-1' : 'mb-4'}}" id="title-ar">
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
                                        <input type="text" name="title_en" value="{{ $contact && $contact->title_en ? $contact->title_en : '' }}" class="form-control {{ $errors->has('title_en') ? 'mb-1' : 'mb-4'}}" id="title-en">
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
                                        <label for="desc-ar">Arabic Description</label>
                                        <textarea name="desc_ar" class="form-control {{ $errors->has('desc_ar') ? 'mb-1' : 'mb-4'}}" id="desc-ar">
                                            {{ $contact && $contact->desc_ar ? $contact->desc_ar : '' }}
                                        </textarea>
                                        @error('desc_ar')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="desc-en">English Description</label>
                                        <textarea name="desc_en" class="form-control {{ $errors->has('desc_en') ? 'mb-1' : 'mb-4'}}" id="desc-en">
                                            {{ $contact && $contact->desc_en ? $contact->desc_en : '' }}
                                        </textarea>
                                        @error('desc_en')
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
                                        <label for="email">email</label>
                                        <input type="email" name="email" value="{{ $contact && $contact->email ? $contact->email : '' }}" class="form-control {{ $errors->has('email') ? 'mb-1' : 'mb-4'}}" id="email">
                                        @error('email')
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
                                        <label for="email_desc-ar">Arabic Email Description</label>
                                        <textarea name="email_desc_ar" class="form-control {{ $errors->has('email_desc_ar') ? 'mb-1' : 'mb-4'}}" id="email_desc-ar">
                                            {{ $contact && $contact->email_desc_ar ? $contact->email_desc_ar : '' }}
                                        </textarea>
                                        @error('email_desc_ar')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="email_desc-en">English Email Description</label>
                                        <textarea name="email_desc_en" class="form-control {{ $errors->has('email_desc_en') ? 'mb-1' : 'mb-4'}}" id="email_desc-en">
                                            {{ $contact && $contact->email_desc_en ? $contact->email_desc_en : '' }}
                                        </textarea>
                                        @error('email_desc_en')
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
                                        <label for="phone">phone</label>
                                        <input type="text" name="phone" value="{{ $contact && $contact->phone ? $contact->phone : '' }}" class="form-control {{ $errors->has('phone') ? 'mb-1' : 'mb-4'}}" id="phone">
                                        @error('phone')
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
                                        <label for="phone_desc-ar">Arabic Phone Description</label>
                                        <textarea name="phone_desc_ar" class="form-control {{ $errors->has('phone_desc_ar') ? 'mb-1' : 'mb-4'}}" id="phone_desc-ar">
                                            {{ $contact && $contact->phone_desc_ar ? $contact->phone_desc_ar : '' }}
                                        </textarea>
                                        @error('phone_desc_ar')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="phone_desc-en">English Phone Description</label>
                                        <textarea name="phone_desc_en" class="form-control {{ $errors->has('phone_desc_en') ? 'mb-1' : 'mb-4'}}" id="phone_desc-en">
                                            {{ $contact && $contact->phone_desc_en ? $contact->phone_desc_en : '' }}
                                        </textarea>
                                        @error('phone_desc_en')
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
                                        <label for="address_link">address_link</label>
                                        <input type="link" name="address_link" value="{{ $contact && $contact->address_link ? $contact->address_link : '' }}" class="form-control {{ $errors->has('address_link') ? 'mb-1' : 'mb-4'}}" id="address_link">
                                        @error('address_link')
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
                                        <label for="address-ar">Arabic Address</label>
                                        <textarea name="address_ar" class="form-control {{ $errors->has('address_ar') ? 'mb-1' : 'mb-4'}}" id="address-ar">
                                            {{ $contact && $contact->address_ar ? $contact->address_ar : '' }}
                                        </textarea>
                                        @error('address_ar')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="address-en">English Address</label>
                                        <textarea name="address_en" class="form-control {{ $errors->has('address_en') ? 'mb-1' : 'mb-4'}}" id="address-en">
                                            {{ $contact && $contact->address_en ? $contact->address_en : '' }}
                                        </textarea>
                                        @error('address_en')
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
                                            <option {{ $contact && $contact->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                            <option {{ $contact && $contact->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
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
@endpush
