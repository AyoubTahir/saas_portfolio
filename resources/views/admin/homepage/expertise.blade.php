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
            <h3>Expertise Section</h3>
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
                    <li><a href="#">Home</a></li>
                    <li class="active"><a href="#">Expertise Section</a> </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')

<div class="row" id="cancel-row" style="{{ $expertise != '' ? '' : 'display: none' }}">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-12 col-12">
                        <h4>Expertises Details </h4>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12 col-12 d-flex align-items-center justify-content-end">
                        <button id="openModal" class="btn btn-success btn-lg mr-3" data-toggle="modal" data-target="#addexpertise">
                            <i class="flaticon-circle-plus mr-1"></i>
                            Add Expertise
                        </button>
                        <button class="btn btn-danger btn-lg mr-3 d-none" id="delete-fields" onclick="deleteTable('table-form')">
                            <i class="flaticon-delete mr-1"></i>
                            Delete Expertises
                        </button>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area pb-0">
                <div class="table-responsive mb-4">
                    <form id="table-form" action="{{ route('home.expertises.destroy') }}" method="POST">
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
                                    <th>Created</th>
                                    <th class="align-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($expertise && $expertise->expertisesfield)
                                    @foreach ( $expertise->expertisesfield as $field )
                                    <tr>
                                        <td class="checkbox-column">
                                            <div class="custom-control custom-checkbox checkbox-primary">
                                            <input type="checkbox" name="ids[]" value="{{ $field->id }}" class="custom-control-input todochkbox" id="user-{{ $field->id }}">
                                            <label class="custom-control-label" for="user-{{ $field->id }}"></label>
                                            </div>
                                        </td>
                                        <td><a href="{{ route('home.expertises.show',$field->id) }}">{{ $field->name_ar }}</a></td>
                                        <td><a href="{{ route('home.expertises.show',$field->id) }}">{{ $field->name_en }}</a></td>
                                        <td>{{ $field->created_at }}</td>
                                        <td class="text-center">
                                            <div class="dropdown custom-dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flaticon-dot-three fs-17"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                    <a class="dropdown-item" href="{{ route('home.expertises.edit',$field->id) }}">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="deleteTable('delete-field-{{ $field->id }}-form')">Delete</a>
                                                    <form id="delete-field-{{ $field->id }}-form" action="{{ route('home.expertises.delete',$field->id) }}" method="POST" class="d-none">
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
                                    <th>Title Ar</th>
                                    <th>Ttitle En</th>
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

<div class="row" id="cancel-row" style="{{ $expertise != '' && count($expertise ->expertisesField) > 0 ? '' : 'display: none' }}">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-12 col-12">
                        <h4>Skills Details </h4>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12 col-12 d-flex align-items-center justify-content-end">
                        <button id="openModalskill" class="btn btn-success btn-lg mr-3" data-toggle="modal" data-target="#addskill">
                            <i class="flaticon-circle-plus mr-1"></i>
                            Add Skill
                        </button>
                        <button class="btn btn-danger btn-lg mr-3 d-none" id="delete-fields2" onclick="deleteTable('table-form2')">
                            <i class="flaticon-delete mr-1"></i>
                            Delete Skills
                        </button>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area pb-0">
                <div class="table-responsive mb-4">
                    <form id="table-form2" action="{{ route('home.skills.destroy') }}" method="POST">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th class="checkbox-column" style="width: 1rem;">
                                        <div class="custom-control custom-checkbox checkbox-primary">
                                        <input type="checkbox" class="custom-control-input todochkbox2" id="todoAll2">
                                        <label class="custom-control-label" for="todoAll2"></label>
                                        </div>
                                    </th>
                                    <th>Skill Ar</th>
                                    <th>Skill En</th>
                                    <th>Level</th>
                                    <th>Created</th>
                                    <th class="align-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($expertise && $expertise->expertisesfield)
                                    @foreach ( $expertise->expertisesfield as $field )
                                        @foreach ( $field->skills as $skill)
                                            <tr>
                                                <td class="checkbox-column">
                                                    <div class="custom-control custom-checkbox checkbox-primary">
                                                    <input type="checkbox" name="ids[]" value="{{ $skill->id }}" class="custom-control-input todochkbox2" id="user-{{ $skill->id }}">
                                                    <label class="custom-control-label" for="user-{{ $skill->id }}"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $skill->skill_ar }}</td>
                                                <td>{{ $skill->skill_en }}</td>
                                                <td>{{ $skill->lvl }}</td>
                                                <td>{{ $skill->created_at }}</td>
                                                <td class="text-center">
                                                    <div class="dropdown custom-dropdown">
                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="flaticon-dot-three fs-17"></i>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                            <a class="dropdown-item" href="{{ route('home.skills.edit',$skill->id) }}">Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);" onclick="deleteTable('delete-field-{{ $skill->id }}-form2')">Delete</a>
                                                            <form id="delete-field-{{ $skill->id }}-form2" action="{{ route('home.skills.delete',$skill->id) }}" method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Skill Ar</th>
                                    <th>Skill En</th>
                                    <th>Level</th>
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
        <form class="general-info" method="POST" action="{{ route('home.expertises.updatesection') }}" enctype="multipart/form-data">
            @csrf
            <div class="info">
                <h6 class="mt-4">Expertises Section Image</h6>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="upload border-0 hero-bg">
                            <input type="file" name="image" id="input-file-max-fs" class="dropify" data-default-file="{{ $expertise &&  $expertise->image ? asset('uploads/'.$expertise->image) : asset('assets/images/home/02.jpg') }}" data-max-file-size="2M" />
                            <p class="mt-2 text-center"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                            @error('image')
                                <span class="invalid-feedback" style="display: inline-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <h6 class="mt-4">Expertises Section Information</h6>
                <div class="row">
                    <div class="col-lg-12 mt-md-0 mt-4">
                        <div class="form">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="title-ar">Arabic Title</label>
                                        <input type="text" name="title_ar" value="{{$expertise &&  $expertise->title_ar ? $expertise->title_ar : '' }}" class="form-control {{ $errors->has('title_ar') ? 'mb-1' : 'mb-4'}}" id="title-ar">
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
                                        <input type="text" name="title_en" value="{{ $expertise && $expertise->title_en ? $expertise->title_en : '' }}" class="form-control {{ $errors->has('title_en') ? 'mb-1' : 'mb-4'}}" id="title-en">
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
                                        <input type="text" name="description_ar" value="{{$expertise &&  $expertise->description_ar ? $expertise->description_ar : '' }}" class="form-control {{ $errors->has('description_ar') ? 'mb-1' : 'mb-4'}}" id="description-ar">
                                        @error('description_ar')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="description-en">English description</label>
                                        <input type="text" name="description_en" value="{{ $expertise && $expertise->description_en ? $expertise->description_en : '' }}" class="form-control {{ $errors->has('description_en') ? 'mb-1' : 'mb-4'}}" id="description-en">
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
                                            <option {{ $expertise && $expertise->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                            <option {{ $expertise && $expertise->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
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
<div class="modal fade" id="addexpertise" tabindex="-1" role="dialog" aria-labelledby="addexpertiseLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('home.expertises.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="formInputModalLabel">Add New expertise</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="name-ar">Arabic Expertise Title</label>
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
                                <label for="name-en">English Expertise Title</label>
                                <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control {{ $errors->has('name_en') ? 'mb-1' : 'mb-4'}}" id="name-en">
                                @error('name_en')
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

<!-- Modal -->
<div class="modal fade" id="addskill" tabindex="-1" role="dialog" aria-labelledby="addskillLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('home.skills.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="formInputModalLabel">Add New Skill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="skill-ar">Arabic Skill</label>
                                <input type="text" name="skill_ar" value="{{ old('skill_ar') }}" class="form-control {{ $errors->has('skill_ar') ? 'mb-1' : 'mb-4'}}" id="skill-ar">
                                <input type="hidden" name="is_modal_skill" value="yes_modal">
                                @error('skill_ar')
                                    <span class="invalid-feedback" style="display: inline-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="skill-en">English Skill</label>
                                <input type="text" name="skill_en" value="{{ old('skill_en') }}" class="form-control {{ $errors->has('skill_en') ? 'mb-1' : 'mb-4'}}" id="skill-en">
                                @error('skill_en')
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
                                <label for="lvl">Skill LvL</label>
                                <input type="text" name="lvl" value="{{ old('lvl') }}" class="form-control {{ $errors->has('lvl') ? 'mb-1' : 'mb-4'}}" id="lvl">
                                @error('lvl')
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
                                <label for="expertise">Expertises</label>
                                <select class="form-control" name="expertise_field_id" id="expertise">
                                    @foreach ($expertise->expertisesField as $field)
                                        <option value="{{$field->id}}">{{$field->name_ar}} - {{$field->name_en}}</option>
                                    @endforeach
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

        $('.todochkbox2').on('click', function () {
            if($('.todochkbox2:checkbox:checked').length > 1)
            {
                $('#delete-fields2').removeClass('d-none')
            }
            else{
                $('#delete-fields2').addClass('d-none')
            }
        });

    </script>

    @if (old('is_modal') == 'yes_modal')
        <script>
            $('#openModal').click();
        </script>
    @endif
    @if (old('is_modal_skill') == 'yes_modal')
        <script>
            $('#openModalskill').click();
        </script>
    @endif
@endpush
