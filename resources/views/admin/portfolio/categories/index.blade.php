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
            <h3>Categories List</h3>
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
                    <li><a href="#">Home</a></li>
                    <li class="active"><a href="#">Categories List</a> </li>
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
                        <h4>Categories List </h4>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12 col-12 d-flex align-items-center justify-content-end">
                        <button id="openModal" class="btn btn-success btn-lg mr-3" data-toggle="modal" data-target="#addCategory">
                            <i class="flaticon-circle-plus mr-1"></i>
                            Add Category
                        </button>
                        <button id="openModalEdit" class="btn btn-success btn-lg mr-3" data-toggle="modal" data-target="#editCategory" style="display: none">
                            <i class="flaticon-circle-plus mr-1"></i>
                            Edit Category
                        </button>
                        <button class="btn btn-danger btn-lg mr-3 d-none" id="delete-fields" onclick="deleteTable('table-form')">
                            <i class="flaticon-delete mr-1"></i>
                            Delete Categories
                        </button>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area pb-0">
                <div class="table-responsive mb-4">
                    <form id="table-form" action="{{ route('portfolio.categories.destroy') }}" method="POST">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th class="checkbox-column" style="width: 1rem;">
                                        <div class="custom-control custom-checkbox checkbox-primary">
                                        <input type="checkbox" class="custom-control-input todochkbox" id="todoAll">
                                        <label class="custom-control-label" for="todoAll"></label>
                                        </div>
                                    </th>
                                    <th>Name Ar</th>
                                    <th>Name En</th>
                                    <th>Created</th>
                                    <th class="align-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($categories)
                                    @foreach ( $categories as $category )
                                    <tr>
                                        <td class="checkbox-column">
                                            <div class="custom-control custom-checkbox checkbox-primary">
                                            <input type="checkbox" name="ids[]" value="{{ $category->id }}" class="custom-control-input todochkbox" id="user-{{ $category->id }}">
                                            <label class="custom-control-label" for="user-{{ $category->id }}"></label>
                                            </div>
                                        </td>
                                        <td>{{ $category->name_ar }}</td>
                                        <td>{{ $category->name_en }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td class="text-center">
                                            <div class="dropdown custom-dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flaticon-dot-three fs-17"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                    <a class="dropdown-item" href="{{ route('portfolio.categories.edit',$category->id) }}">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="deleteTable('delete-category-{{ $category->id }}-form')">Delete</a>
                                                    <form id="delete-category-{{ $category->id }}-form" action="{{ route('portfolio.categories.delete',$category->id) }}" method="POST" class="d-none">
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
                                    <th>Name Ar</th>
                                    <th>Name En</th>
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

<!-- Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategoryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('portfolio.categories.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="formInputModalLabel">Add New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="name-ar">Arabic Category Name</label>
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
                                <label for="name-en">English Category Name</label>
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
<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="editCategoryLabel" aria-hidden="true" style="{{ isset($currentCategory) && $currentCategory ? '' : 'display: none'}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ isset($currentCategory) && $currentCategory ? route('portfolio.categories.update',$currentCategory->id) : '' }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="formInputModalLabel">Edit Category</h5>
                    <button type="button" id="modalClose" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" id="modalCloseSpan">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="name-ar">Arabic Category Name</label>
                                <input type="text" name="name_ar" value="{{ isset($currentCategory) && $currentCategory ? $currentCategory->name_ar : '' }}" class="form-control {{ $errors->has('name_ar') ? 'mb-1' : 'mb-4'}}" id="name-ar">
                                @error('name_ar')
                                    <span class="invalid-feedback" style="display: inline-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="name-en">English Category Name</label>
                                <input type="text" name="name_en" value="{{ isset($currentCategory) && $currentCategory ? $currentCategory->name_en : '' }}" class="form-control {{ $errors->has('name_en') ? 'mb-1' : 'mb-4'}}" id="name-en">
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
                    <button type="button" id="closeBtn" class="btn btn-dark mt-3 mb-3" data-dismiss="modal">Close</button>
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
    @if (isset($currentCategory) && $currentCategory && old('is_modal') != 'yes_modal')
        <script>
            $('#openModalEdit').click();
        </script>
    @endif
    @if (isset($currentCategory))
        <script>
            $('body').click(function(event) {
                if ($(event.target).is('#editCategory') || $(event.target).is('#closeBtn') || $(event.target).is('#modalClose') || $(event.target).is('#modalCloseSpan') )
                {
                    window.location.href = '/t-admin/portfolio/categories';
                }
            });
        </script>
    @endif
@endpush
