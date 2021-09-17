@extends('layouts.admin')

@section('page_css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/plugins/dropify/dropify.min.css')}}">

    <link href="{{asset('assets/admin/assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/admin/assets/css/design-css/design.css')}}" rel="stylesheet" type="text/css" />

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
            <h3>Resume Section</h3>
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
                    <li><a href="#">Home</a></li>
                    <li class="active"><a href="#">Resume Section</a> </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')

<div class="row" id="cancel-row" style="{{ $resume != '' ? '' : 'display: none' }}">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-12 col-12">
                        <h4>Resume Items Details </h4>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12 col-12 d-flex align-items-center justify-content-end">
                        <button id="openModal" class="btn btn-success btn-lg mr-3" data-toggle="modal" data-target="#addresume">
                            <i class="flaticon-circle-plus mr-1"></i>
                            Add Resume Item
                        </button>
                        <button class="btn btn-danger btn-lg mr-3 d-none" id="delete-fields" onclick="deleteTable('table-form')">
                            <i class="flaticon-delete mr-1"></i>
                            Delete Resume Items
                        </button>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area pb-0">
                <div class="table-responsive mb-4">
                    <form id="table-form" action="{{ route('home.resumes.destroy') }}" method="POST">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th class="checkbox-column" style="width: 1rem;">
                                        <div class="custom-control custom-checkbox checkbox-primary">
                                        <input type="checkbox" class="custom-control-input todochkbox" id="todoAll">
                                        <label class="custom-control-label" for="todoAll"></label>
                                        </div>
                                    </th>
                                    <th>Title Ar</th>
                                    <th>Title En</th>
                                    <th>Job Ar</th>
                                    <th>Job En</th>
                                    <th>Description Ar</th>
                                    <th>Description En</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="align-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($resume && $resume->resumesfield)
                                    @foreach ( $resume->resumesfield as $field )
                                    <tr>
                                        <td class="checkbox-column">
                                            <div class="custom-control custom-checkbox checkbox-primary">
                                            <input type="checkbox" name="ids[]" value="{{ $field->id }}" class="custom-control-input todochkbox" id="user-{{ $field->id }}">
                                            <label class="custom-control-label" for="user-{{ $field->id }}"></label>
                                            </div>
                                        </td>
                                        <td>{{ $field->name_ar }}</td>
                                        <td>{{ $field->name_en }}</td>
                                        <td>{{ $field->job_ar }}</td>
                                        <td>{{ $field->job_en }}</td>
                                        <td>{{ $field->desc_ar }}</td>
                                        <td>{{ $field->desc_en }}</td>
                                        <td>{{ $field->date_from }}</td>
                                        <td>{{ $field->date_to }}</td>
                                        <td class="text-center">
                                            <div class="dropdown custom-dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flaticon-dot-three fs-17"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                    <a class="dropdown-item" href="{{ route('home.resumes.edit',$field->id) }}">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="deleteTable('delete-field-{{ $field->id }}-form')">Delete</a>
                                                    <form id="delete-field-{{ $field->id }}-form" action="{{ route('home.resumes.delete',$field->id) }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Icon</th>
                                    <th>Title Ar</th>
                                    <th>Title En</th>
                                    <th>Description Ar</th>
                                    <th>Description En</th>
                                    <th>Created</th>
                                    <th class="align-center">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>
            <div class="widget-content widget-content-area text-center p-0">

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
        <form class="general-info" method="POST" action="{{ route('home.resumes.updatesection') }}" enctype="multipart/form-data">
            @csrf
            <div class="info">
                <h6 class="mt-4">Resume Section Information</h6>
                <div class="row">
                    <div class="col-lg-12 mt-md-0 mt-4">
                        <div class="form">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="title-ar">Arabic Title</label>
                                        <input type="text" name="title_ar" value="{{$resume &&  $resume->title_ar ? $resume->title_ar : '' }}" class="form-control {{ $errors->has('title_ar') ? 'mb-1' : 'mb-4'}}" id="title-ar">
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
                                        <input type="text" name="title_en" value="{{ $resume && $resume->title_en ? $resume->title_en : '' }}" class="form-control {{ $errors->has('title_en') ? 'mb-1' : 'mb-4'}}" id="title-en">
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
                                        <label for="description-ar">Arabic Description</label>
                                        <textarea name="description_ar" class="form-control {{ $errors->has('description_ar') ? 'mb-1' : 'mb-4'}}" id="description-ar">
                                            {{$resume &&  $resume->description_ar ? $resume->description_ar : '' }}
                                        </textarea>
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
                                        <textarea name="description_en" class="form-control {{ $errors->has('description_en') ? 'mb-1' : 'mb-4'}}" id="description-en">
                                            {{ $resume && $resume->description_en ? $resume->description_en : '' }}
                                        </textarea>
                                        @error('description_en')
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
                                            <option {{ $resume && $resume->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                            <option {{ $resume && $resume->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
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

<!-- Modal -->
<div class="modal fade" id="addresume" tabindex="-1" role="dialog" aria-labelledby="addresumeLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('home.resumes.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="formInputModalLabel">Add New Resume Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="name-ar">Arabic Title</label>
                                <input type="text" name="name_ar" value="{{ old('name_ar') }}" class="form-control {{ $errors->has('name_ar') ? 'mb-1' : 'mb-4'}}" id="name-ar">
                                @error('name_ar')
                                    <span class="invalid-feedback" style="display: inline-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="name-en">English Title</label>
                                <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control {{ $errors->has('name_en') ? 'mb-1' : 'mb-4'}}" id="name-en">
                                @error('name_en')
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
                                <label for="job-ar">Arabic Job Title</label>
                                <input type="text" name="job_ar" value="{{ old('job_ar') }}" class="form-control {{ $errors->has('job_ar') ? 'mb-1' : 'mb-4'}}" id="job-ar">
                                @error('job_ar')
                                    <span class="invalid-feedback" style="display: inline-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="job-en">English Job Title</label>
                                <input type="text" name="job_en" value="{{ old('job_en') }}" class="form-control {{ $errors->has('job_en') ? 'mb-1' : 'mb-4'}}" id="job-en">
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
                                <label for="desc-ar">Arabic Description</label>
                                <input type="text" name="desc_ar" value="{{ old('desc_ar') }}" class="form-control {{ $errors->has('desc_ar') ? 'mb-1' : 'mb-4'}}" id="desc-ar">
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
                                <input type="text" name="desc_en" value="{{ old('desc_en') }}" class="form-control {{ $errors->has('desc_en') ? 'mb-1' : 'mb-4'}}" id="desc-en">
                                @error('desc_en')
                                    <span class="invalid-feedback" style="display: inline-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <label for="date-from">From Date</label>
                            <div class="input-control text mb-5" data-role="datepicker" data-preset="2015-05-01">
                                <input type="text" name="date_from" value="{{ old('date_from') }}" id="date-from">
                                <button class="button"><span class="flaticon-calendar-1"></span></button>
                                @error('date_from')
                                    <span class="invalid-feedback" style="display: inline-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <label for="date-to">To Date</label>
                            <div class="input-control text mb-5" data-role="datepicker" data-preset="2015-05-01">
                                <input type="text" name="date_to" value="{{ old('date_to') }}" id="date-to">
                                <button class="button"><span class="flaticon-calendar-1"></span></button>
                                @error('date_to')
                                    <span class="invalid-feedback" style="display: inline-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mt-3 mb-3">Save changes</button>
                    <button type="button" class="btn btn-dark mt-3 mb-3" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('page_scripts')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('assets/admin/assets/js/modal/classie.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{asset('assets/admin/plugins/dropify/dropify.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/design-js/design.js')}}"></script>

    <script>
        $('.dropify').dropify({
            messages: { 'default': 'Click to Upload or Drag n Drop', 'remove':  '<i class="flaticon-close-fill"></i>', 'replace': 'Upload or Drag n Drop' }
        });
    </script>
    <script>
        checkall('todoAll', 'todochkbox');
        $('[data-toggle="tooltip"]').tooltip();

        function deleteTable(fom_id)
        {
            event.preventDefault();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete',
                padding: '2em'
            }).then(function(result) {
                if (result.value) {
                    document.getElementById(fom_id).submit();
                }
            })
        }

        $('.todochkbox').on('click', function () {
            if($('.todochkbox:checkbox:checked').length > 1)
            {
                $('#delete-fields').removeClass('d-none')
            }
            else{
                $('#delete-fields').addClass('d-none')
            }
        });

    </script>

    @if (old('is_modal') == 'yes_modal')
        <script>
            $('#openModal').click();
        </script>
    @endif
@endpush
