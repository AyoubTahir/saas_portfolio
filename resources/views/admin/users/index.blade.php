@extends('layouts.admin')

@section('page_css')
<link href="{{ asset('assets/admin/assets/css/ui-kit/buttons/creative/creative-icon-buttons.css')}}" rel="stylesheet" type="text/css" />

<style>
    .table td, .table th { border-top: 1px solid #f1f3f1; }
    .table-controls>li>a i { color: #d3d3d3; }
</style>
@endsection

@section('page_header')
    <div class="page-header">
        <div class="page-title">
            <h3>Users List</h3>
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
                    <li><a href="#">Users</a></li>
                    <li class="active"><a href="#">Users List</a> </li>
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
                            <h4>Users Information Details </h4>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12 col-12 d-flex align-items-center justify-content-end">
                            <a href="{{route('users.create')}}" class="btn btn-success btn-lg mr-3">
                                <i class="flaticon-circle-plus mr-1"></i>
                                Add User
                            </a>
                            <button class="btn btn-danger btn-lg mr-3 d-none" id="delete-users" onclick="deleteUser('table-form')">
                                <i class="flaticon-delete mr-1"></i>
                                Delete Users
                            </button>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area pb-0">
                    <div class="table-responsive mb-4">
                        <form id="table-form" action="{{ route('users.destroy') }}" method="POST">
                            <table class="table table-bordered mb-4">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column" style="width: 1rem;">
                                            <div class="custom-control custom-checkbox checkbox-primary">
                                            <input type="checkbox" class="custom-control-input todochkbox" id="todoAll">
                                            <label class="custom-control-label" for="todoAll"></label>
                                            </div>
                                        </th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Created</th>
                                        <th class="align-center">Status</th>
                                        <th class="align-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $users as $user )
                                    <tr>
                                        <td class="checkbox-column">
                                            <div class="custom-control custom-checkbox checkbox-primary">
                                            <input type="checkbox" name="ids[]" value="{{ $user->id }}" class="custom-control-input todochkbox" id="user-{{ $user->id }}">
                                            <label class="custom-control-label" for="user-{{ $user->id }}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="d-flex" href="{{ route('site.home',str_replace(' ','-', $user->name)) }}"  target="_blank">
                                                    <div class="usr-img-frame mr-2 rounded-circle">
                                                        <img alt="admin-profile" class="img-fluid rounded-circle" src="{{ asset('uploads/'.$user->image) }}">
                                                    </div>
                                                    <p class="align-self-center mb-0">{{ $user->name }}</p>
                                                </a>
                                            </div>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td class="align-center"><span class="badge badge-{{ $user->status ? 'success' : 'danger' }}">{{ $user->status ? 'Active' : 'Inactive' }}</span></td>
                                        <td class="text-center">

                                            <div class="dropdown custom-dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flaticon-dot-three fs-17"></i>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                    <a class="dropdown-item" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="deleteUser('delete-user-{{ $user->id }}-form')">Delete</a>
                                                    <form id="delete-user-{{ $user->id }}-form" action="{{ route('users.delete',$user->id) }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Created</th>
                                        <th class="align-center">Status</th>
                                        <th class="align-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                </div>
                <div class="widget-content widget-content-area text-center p-0">
                    {{ $users->links('admin.paginator') }}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page_model')

@endsection

@push('page_scripts')
<script>
    checkall('todoAll', 'todochkbox');
    $('[data-toggle="tooltip"]').tooltip();

    function deleteUser(fom_id)
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
            $('#delete-users').removeClass('d-none')
        }
        else{
            $('#delete-users').addClass('d-none')
        }
    });
</script>
@endpush
