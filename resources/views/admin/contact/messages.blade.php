@extends('layouts.admin')

@section('page_css')
<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="{{ asset('assets/admin/assets/css/apps/mailbox.css') }}" rel="stylesheet" type="text/css" />
<!--  END CUSTOM STYLE FILE  -->

@endsection

@section('page_header')
    <div class="page-header">
        <div class="page-title">
            <h3>Inbox</h3>
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
                    <li><a href="#">Home</a></li>
                    <li class="active"><a href="#">Messages</a> </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')

<div class="row layout-spacing">
    <div class="col-xl-3 col-lg-4 col-md-4 mb-md-0 mb-5">
        <div class="options">

            <div class="card mail-actions" style="">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="media mb-5">
                              <div class="media-body">
                                <h5 class="mt-0">{{ Auth::user()->name }}</h5>
                                <a href="" class="mr-2"><i class="flaticon-user-7"></i> Profile</a>
                                <a href=""><i class="flaticon-settings-7"></i> Setting</a>
                              </div>
                            </div>
                        </div>

                        <div class="col-sm-12 text-center">
                            <a class="btn btn-rounded btn-gradient-warning" href="apps_mailbox_compose.html">Compose</a>
                        </div>
                    </div>

                    <ul class="list-unstyled mt-5">
                        <li class="active">
                            <a href="apps_mailbox.html">
                                <i class="flaticon-mail-fill"></i>
                                Inbox @if (MsgCount())<span class="badge badge-primary badge-pill ml-1">{{ MsgCount() }}</span>@endif
                            </a>
                        </li>
                        <li>
                            <a href="apps_mailbox_sent.html">
                                <i class="flaticon-send-fill"></i>
                                Sent Mail
                            </a>
                        </li>
                        <li>
                            <a href="apps_mailbox_important.html">
                                <i class="flaticon-mail-14"></i>
                                Important
                            </a>
                        </li>
                        <li>
                            <a href="apps_mailbox_trash.html">
                                <i class="flaticon-delete-fill"></i>
                                Trash
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-lg-8 col-md-8">
        <div class="inbox-section">
            <div class="row">
                <div class="col-md-12">
                    <div class="row mb-4">
                        <div class="col-md-9 col-6">
                            <h4 class="heading-title">Inbox</h4>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group search">
                                <input type="text" class="form-control" id="exampleSerch" placeholder="Search">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 mb-4">
                    <div class="inbox-options">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <div class="chk-all">
                                    <label class="new-control new-checkbox checkbox-primary mr-0">
                                      <input type="checkbox" class="new-control-input" id="inboxAll">
                                      <span class="new-control-indicator"></span><span style="visibility:hidden">c</span>
                                    </label>

                                    <div class="dropdown float-right">
                                        <div class="dropdown-toggle" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"> All</div>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <a class="dropdown-item" href="#"> All</a>
                                            <a class="dropdown-item" href="#"> None</a>
                                            <a class="dropdown-item" href="#"> Read</a>
                                            <a class="dropdown-item" href="#"> Unread</a>
                                            <a class="dropdown-item" href="#"> Starred</a>
                                            <a class="dropdown-item" href="#"> Unstarred</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-inline-item"><i class="flaticon-reload-2"></i></li>
                            <li id="trash" class="list-inline-item"><i class="flaticon-delete-1"></i></li>
                            <li class="list-inline-item">
                                <div class="dropdown">
                                    <div class="dropdown-toggle d-icon-none" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" role="menu" aria-expanded="false"> <i class="flaticon-down-arrow-2"></i></div>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                        <a class="dropdown-item changeStauts" data-name="unread" href="#"> Mark as unread</a>
                                        <a class="dropdown-item changeStauts" data-name="read" href="#"> Mark as read</a>
                                        <a class="dropdown-item changeStauts" data-name="important" href="#"> Mark as important</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 ml-auto col-lg-12 col-md-12 col-sm-12 mb-4">
                    <nav class="mail-pagination" aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item non-hover">
                                <a class="page-link" href="#">1-50 of 9</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link br-0" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive mb-5">
                        <form id="table-form" action="{{ route('messages.destroy') }}" method="POST">
                            @csrf
                            <input id="change_status" type="hidden" name="change_status">
                            <table class="table mb-0">
                                <tbody>
                                    @if($messages)
                                        @foreach ( $messages as $message )
                                            <tr>
                                                <td>
                                                    <label class="new-control new-checkbox checkbox-primary mr-0">
                                                    <input type="checkbox" name="ids[]" value="{{ $message->id }}" class="messageCheck new-control-input inbox-chkbox">
                                                    <span class="new-control-indicator"></span><span style="visibility:hidden">c</span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <a href="{{ route('messages.show',$message->id) }}" class="mail-link">
                                                        <span class="message-body {{ $message->readed == 0 ? 'message-new' : '' }}">{{ $message->full_name }}</span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('messages.show',$message->id) }}" class="mail-link">
                                                    <span class="message-head {{ $message->readed == 0 ? 'message-new' : '' }}">{{ $message->subject }} : </span>
                                                    <span class="message-body">{{ Str::limit($message->message, 20) }}<span class="message-dot message-new">...</span></span></a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('messages.show',$message->id) }}" class="mail-link"><span>{{ $message->created_at->diffForHumans() }}</span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('page_scripts')
<script src="{{asset('assets/admin/assets/js/apps/custom-mailbox.js')}}"></script>

<script>
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

        $('#trash').on('click', function () {

            if($('.messageCheck:checkbox:checked').length > 0)
            {
                deleteTable('table-form');
            }
            else{
                Swal({
                    title:"Oops...",
                    text:"Please Check Message To Delete",
                    type: 'error',
                    padding: '2em'
                })
            }
        });

        $('.changeStauts').on('click', function (){

           if($('.messageCheck:checkbox:checked').length > 0)
            {
                $('#change_status').val($(this).attr("data-name"));
                document.getElementById('table-form').submit();
            }
            else{
                Swal({
                    title:"Oops...",
                    text:"Please Check Message To Update",
                    type: 'error',
                    padding: '2em'
                })
            }
        });

</script>
@endpush
