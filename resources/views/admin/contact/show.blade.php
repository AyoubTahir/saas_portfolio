@extends('layouts.admin')

@section('page_css')
<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="{{ asset('assets/admin/assets/css/apps/mailbox-read.css') }}" rel="stylesheet" type="text/css" />
<!--  END CUSTOM STYLE FILE  -->

@endsection

@section('page_header')
    <div class="page-header">
        <div class="page-title">
            <h3>Message</h3>
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li><a href="{{route('dashboard')}}"><i class="flaticon-home-fill"></i></a></li>
                    <li><a href="{{route('dashboard')}}">Home</a></li>
                    <li><a href="{{route('messages.index')}}">Inbox</a></li>
                    <li class="active"><a href="#">Message</a> </li>
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
                                Inbox <span class="badge badge-primary badge-pill ml-1">6</span>
                            </a>
                        </li>
                        <li>
                            <a href="apps_mailbox_draft.html">
                                <i class="flaticon-email-fill"></i>
                                Draft <span class="badge badge-warning badge-pill ml-1">2</span>
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
                                Important <span class="badge badge-new badge-pill ml-1">8</span>
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
                <div class="col-md-12 messages-timeline">

                    <div class="messages mb-5">
                        <div class="media">
                            <div class="media-body">
                                <h5 class="mt-0">{{ $message->subject }}</h5>
                                <p class="messages-meta-date">{{ $message->created_at->diffForHumans() }}</p>
                                <p class="messages-to">From: <strong>{{ $message->full_name }}, {{ $message->email }}</strong></p>
                            </div>
                        </div>
                        <div class="mt-4 message-body">
                            <p class="mb-3 strong"><strong>Hi</strong></p>
                            <p>{{ $message->message }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('page_scripts')
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
</script>
@endpush
