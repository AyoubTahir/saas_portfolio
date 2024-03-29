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
            <h3>Client Section</h3>
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
                    <li><a href="#">Home</a></li>
                    <li class="active"><a href="#">Client Section</a> </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')

<div class="row" id="cancel-row" style="{{ $client != '' ? '' : 'display: none' }}">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-12 col-12">
                        <h4>clients Details </h4>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12 col-12 d-flex align-items-center justify-content-end">
                        <button id="openModal" class="btn btn-success btn-lg mr-3" data-toggle="modal" data-target="#addclient">
                            <i class="flaticon-circle-plus mr-1"></i>
                            Add client
                        </button>
                        <button class="btn btn-danger btn-lg mr-3 d-none" id="delete-fields" onclick="deleteTable('table-form')">
                            <i class="flaticon-delete mr-1"></i>
                            Delete clients
                        </button>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area pb-0">
                <div class="table-responsive mb-4">
                    <form id="table-form" action="{{ route('home.clients.destroy') }}" method="POST">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th class="checkbox-column" style="width: 1rem;">
                                        <div class="custom-control custom-checkbox checkbox-primary">
                                        <input type="checkbox" class="custom-control-input todochkbox" id="todoAll">
                                        <label class="custom-control-label" for="todoAll"></label>
                                        </div>
                                    </th>
                                    <th>Client</th>
                                    <th>Client Job</th>
                                    <th>Project Name</th>
                                    <th>Client Rating</th>
                                    <th class="align-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($client && $client->clientsfield)
                                    @foreach ( $client->clientsfield as $field )
                                    <tr>
                                        <td class="checkbox-column">
                                            <div class="custom-control custom-checkbox checkbox-primary">
                                            <input type="checkbox" name="ids[]" value="{{ $field->id }}" class="custom-control-input todochkbox" id="user-{{ $field->id }}">
                                            <label class="custom-control-label" for="user-{{ $field->id }}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                    <div class="usr-img-frame mr-2 rounded-circle">
                                                        <img alt="admin-profile" class="img-fluid rounded-circle" src="{{ asset('uploads/'.$field->image) }}">
                                                    </div>
                                                    <p class="align-self-center mb-0">{{ $field->name_ar }} - {{ $field->name_en }}</p>
                                            </div>
                                        </td>
                                        <td>{{ $field->job_ar }} - {{ $field->job_en }}</td>
                                        <td>{{ $field->project_ar }} - {{ $field->project_en }}</td>
                                        <td>{{ $field->rating }}</td>
                                        <td class="text-center">
                                            <div class="dropdown custom-dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flaticon-dot-three fs-17"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                    <a class="dropdown-item" href="{{ route('home.clients.edit',$field->id) }}">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="deleteTable('delete-field-{{ $field->id }}-form')">Delete</a>
                                                    <form id="delete-field-{{ $field->id }}-form" action="{{ route('home.clients.delete',$field->id) }}" method="POST" class="d-none">
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
                                    <th>Client</th>
                                    <th>Client Job</th>
                                    <th>Project Name</th>
                                    <th>Client Rating</th>
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
        <form class="general-info" method="POST" action="{{ route('home.clients.updatesection') }}" enctype="multipart/form-data">
            @csrf
            <div class="info">
                <h6 class="mt-4">Clients Section Image</h6>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="upload border-0 hero-bg">
                            <input type="file" name="image" id="input-file-max-fs" class="dropify" data-default-file="{{ $client &&  $client->image ? asset('uploads/'.$client->image) : asset('assets/images/home/02.jpg') }}" data-max-file-size="2M" />
                            <p class="mt-2 text-center"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                            @error('image')
                                <span class="invalid-feedback" style="display: inline-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <h6 class="mt-4">Clients Section Information</h6>
                <div class="row">
                    <div class="col-lg-12 mt-md-0 mt-4">
                        <div class="form">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="title-ar">Arabic Title</label>
                                        <input type="text" name="title_ar" value="{{$client &&  $client->title_ar ? $client->title_ar : '' }}" class="form-control {{ $errors->has('title_ar') ? 'mb-1' : 'mb-4'}}" id="title-ar">
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
                                        <input type="text" name="title_en" value="{{ $client && $client->title_en ? $client->title_en : '' }}" class="form-control {{ $errors->has('title_en') ? 'mb-1' : 'mb-4'}}" id="title-en">
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
                                        <input type="text" name="desc_ar" value="{{$client &&  $client->desc_ar ? $client->desc_ar : '' }}" class="form-control {{ $errors->has('desc_ar') ? 'mb-1' : 'mb-4'}}" id="desc-ar">
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
                                        <input type="text" name="desc_en" value="{{ $client && $client->desc_en ? $client->desc_en : '' }}" class="form-control {{ $errors->has('desc_en') ? 'mb-1' : 'mb-4'}}" id="desc-en">
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
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option {{ $client && $client->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                            <option {{ $client && $client->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
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
<div class="modal fade" id="addclient" tabindex="-1" role="dialog" aria-labelledby="addclientLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('home.clients.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="formInputModalLabel">Add New client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="upload">
                                <input type="file" name="image" id="input-file-max-fs" class="dropify" data-default-file="{{ asset('assets/admin/assets/img/user-avatar.jpg')}}" data-max-file-size="2M" />
                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Client Image</p>
                                @error('image')
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
                                <label for="project-ar">Arabic Project Name</label>
                                <input type="text" name="project_ar" value="{{ old('project_ar') }}" class="form-control {{ $errors->has('project_ar') ? 'mb-1' : 'mb-4'}}" id="project-ar">
                                <input type="hidden" name="is_modal" value="yes_modal">
                                @error('project_ar')
                                    <span class="invalid-feedback" style="display: inline-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="project-en">English Project Name</label>
                                <input type="text" name="project_en" value="{{ old('project_en') }}" class="form-control {{ $errors->has('project_en') ? 'mb-1' : 'mb-4'}}" id="project-en">
                                @error('project_en')
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
                                <label for="name-ar">Arabic client Name</label>
                                <input type="text" name="name_ar" value="{{ old('name_ar') }}" class="form-control {{ $errors->has('name_ar') ? 'mb-1' : 'mb-4'}}" id="name-ar">
                                <input type="hidden" name="is_modal" value="yes_modal">
                                @error('name_ar')
                                    <span class="invalid-feedback" style="display: inline-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="name-en">English client Name</label>
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
                                <label for="job-ar">Arabic client Job</label>
                                <input type="text" name="job_ar" value="{{ old('job_ar') }}" class="form-control {{ $errors->has('job_ar') ? 'mb-1' : 'mb-4'}}" id="job-ar">
                                <input type="hidden" name="is_modal" value="yes_modal">
                                @error('job_ar')
                                    <span class="invalid-feedback" style="display: inline-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="job-en">English client Job</label>
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
                                <label for="opinion-ar">Arabic client Opinion</label>
                                <input type="text" name="opinion_ar" value="{{ old('opinion_ar') }}" class="form-control {{ $errors->has('opinion_ar') ? 'mb-1' : 'mb-4'}}" id="opinion-ar">
                                <input type="hidden" name="is_modal" value="yes_modal">
                                @error('opinion_ar')
                                    <span class="invalid-feedback" style="display: inline-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="opinion-en">English client Opinion</label>
                                <input type="text" name="opinion_en" value="{{ old('opinion_en') }}" class="form-control {{ $errors->has('opinion_en') ? 'mb-1' : 'mb-4'}}" id="opinion-en">
                                @error('opinion_en')
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
                                <label for="rating">Cleint Rating</label>
                                <select class="form-control" name="rating" id="rating">
                                    <option selected value="1">1/10</option>
                                    <option value="2">2/10</option>
                                    <option value="3">3/10</option>
                                    <option value="4">4/10</option>
                                    <option value="5">5/10</option>
                                    <option value="6">6/10</option>
                                    <option value="7">7/10</option>
                                    <option value="8">8/10</option>
                                    <option value="9">9/10</option>
                                    <option value="10">10/10</option>
                                </select>
                                @error('rating')
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
    <script>
        $('.dropify').dropify({
            messages: { 'default': 'Click to Upload or Drag & Drop', 'remove':  '<i class="flaticon-close-fill"></i>', 'replace': 'Upload or Drag n Drop' }
        });
    </script>
    <script>
        checkall('todoAll', 'todochkbox');
        checkall('todoAll2', 'todochkbox2');
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
