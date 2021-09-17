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
            <h3>Facts Section</h3>
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
                    <li><a href="#">Home</a></li>
                    <li class="active"><a href="#">Facts Section</a> </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')

<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-12 col-12">
                        <h4>Facts Details </h4>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12 col-12 d-flex align-items-center justify-content-end">
                        <button id="openModal" class="btn btn-success btn-lg mr-3" data-toggle="modal" data-target="#addFact">
                            <i class="flaticon-circle-plus mr-1"></i>
                            Add Fact
                        </button>
                        <button class="btn btn-danger btn-lg mr-3 d-none" id="delete-fields" onclick="deleteTable('table-form')">
                            <i class="flaticon-delete mr-1"></i>
                            Delete Fact
                        </button>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area pb-0">
                <div class="table-responsive mb-4">
                    <form id="table-form" action="{{ route('home.facts.destroy') }}" method="POST">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th class="checkbox-column" style="width: 1rem;">
                                        <div class="custom-control custom-checkbox checkbox-primary">
                                        <input type="checkbox" class="custom-control-input todochkbox" id="todoAll">
                                        <label class="custom-control-label" for="todoAll"></label>
                                        </div>
                                    </th>
                                    <th>Icon</th>
                                    <th>Title Ar</th>
                                    <th>Title En</th>
                                    <th>Number</th>
                                    <th>Created</th>
                                    <th class="align-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($fact && $fact->factsfield)
                                    @foreach ( $fact->factsfield as $field )
                                    <tr>
                                        <td class="checkbox-column">
                                            <div class="custom-control custom-checkbox checkbox-primary">
                                            <input type="checkbox" name="ids[]" value="{{ $field->id }}" class="custom-control-input todochkbox" id="user-{{ $field->id }}">
                                            <label class="custom-control-label" for="user-{{ $field->id }}"></label>
                                            </div>
                                        </td>
                                        <td>{{ $field->icon }}</td>
                                        <td>{{ $field->title_ar }}</td>
                                        <td>{{ $field->title_en }}</td>
                                        <td>{{ $field->number }}</td>
                                        <td>{{ $field->created_at }}</td>
                                        <td class="text-center">
                                            <div class="dropdown custom-dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flaticon-dot-three fs-17"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                    <a class="dropdown-item" href="{{ route('home.facts.edit',$field->id) }}">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="deleteTable('delete-field-{{ $field->id }}-form')">Delete</a>
                                                    <form id="delete-field-{{ $field->id }}-form" action="{{ route('home.facts.delete',$field->id) }}" method="POST" class="d-none">
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
                                    <th>Ttitle En</th>
                                    <th>Number</th>
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
        <form class="general-info" method="POST" action="{{ route('home.facts.updatesection') }}" enctype="multipart/form-data">
            @csrf
            <div class="info">
                <h6 class="mt-4">Facts Section Background</h6>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="upload border-0 hero-bg">
                            <input type="file" name="cover" id="input-file-max-fs" class="dropify" data-default-file="{{ $fact &&  $fact->cover ? asset('uploads/'.$fact->cover) : asset('assets/images/home/02.jpg') }}" data-max-file-size="2M" />
                            <p class="mt-2 text-center"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                            @error('cover')
                                <span class="invalid-feedback" style="display: inline-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <h6 class="mt-4">Facts Section Information</h6>
                <div class="row">
                    <div class="col-lg-12 mt-md-0 mt-4">
                        <div class="form">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="title-ar">Arabic Title</label>
                                        <input type="text" name="title_ar" value="{{$fact &&  $fact->title_ar ? $fact->title_ar : '' }}" class="form-control {{ $errors->has('title_ar') ? 'mb-1' : 'mb-4'}}" id="title-ar">
                                        @error('title_ar')
                                            @if (old('is_modal') != 'yes_modal')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @endif
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="title-en">English Title</label>
                                        <input type="text" name="title_en" value="{{ $fact && $fact->title_en ? $fact->title_en : '' }}" class="form-control {{ $errors->has('title_en') ? 'mb-1' : 'mb-4'}}" id="title-en">
                                        @error('title_en')
                                            @if (old('is_modal') != 'yes_modal')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @endif
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option {{ $fact && $fact->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                            <option {{ $fact && $fact->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
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
<div class="modal fade" id="addFact" tabindex="-1" role="dialog" aria-labelledby="addFactLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('home.facts.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="formInputModalLabel">Add New Fact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="title-ar">Arabic Fact Title</label>
                                <input type="text" name="title_ar" value="{{ old('title_ar') }}" class="form-control {{ $errors->has('title_ar') ? 'mb-1' : 'mb-4'}}" id="title-ar">
                                @error('title_ar')
                                    @if (old('is_modal') == 'yes_modal')
                                    <span class="invalid-feedback" style="display: inline-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @endif
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="title-en">English fact Title</label>
                                <input type="text" name="title_en" value="{{ old('title_en') }}" class="form-control {{ $errors->has('title_en') ? 'mb-1' : 'mb-4'}}" id="title-en">
                                @error('title_en')
                                    @if (old('is_modal') == 'yes_modal')
                                    <span class="invalid-feedback" style="display: inline-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @endif
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="number">Number</label>
                                <input type="text" name="number" value="{{ old('number') }}" class="form-control {{ $errors->has('number') ? 'mb-1' : 'mb-4'}}" id="number">
                                @error('number')
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
                                <label for="icon">Icon</label>
                                <input type="text" name="icon" value="{{ old('icon') }}" class="form-control {{ $errors->has('icon') ? 'mb-1' : 'mb-4'}}" id="icon">
                                <input type="hidden" name="is_modal" value="yes_modal">
                                @error('icon')
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
