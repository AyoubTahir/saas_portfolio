@extends('layouts.site')

@section('page_css')

<!-- favicon -->
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
<!-- Bootstrap -->
<link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Magnific -->
<link href="{{ asset('assets/css/magnific-popup.css')}}" rel="stylesheet" type="text/css" />
<!-- Icon -->
<link href="{{ asset('assets/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />

<!-- SLICK SLIDER -->
<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}"/>
<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.css')}}"/>
<link rel="stylesheet" href="{{ asset('assets/css/owl.transitions.css')}}"/>
<!-- Custom Css -->
<?php $direction = session()->get('currentLang') == 'en' ? '' : '-rtl';?>
<?php $mode = $user->settings->theme_mode == 0 ? '-dark' : ''; ?>
<link href="{{ asset('assets/css/style'. $mode . $direction .'.css')}}" rel="stylesheet" type="text/css" id="theme-opt" />
<link href="{{ asset('assets/css/colors/default.css')}}" rel="stylesheet" id="color-opt">

@if ($lang == 'ar')
   <style>
    .page-next-level .page-next li:after {content: "\F141" !important;}
    .mdi-chevron-left:before {content: "\F142" !important;}
    .mdi-chevron-right:before {content: "\F141" !important;}
    </style>
@endif

@endsection

@section('content')

    <!-- Home Start -->
    <section class="bg-half d-table w-100" style="background: url({{$project->thumbnail ? asset('uploads/'.$project->thumbnail) : asset('assets/images/home/bg-pages.jpg')}})center center;background-repeat: no-repeat;background-size: cover;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <h1 class="title" style="color: #ffc107 !important;text-transform: uppercase;letter-spacing: .4rem;"> {{ $project['title_'.$lang] }} </h1>
                        <ul class="page-next bg-light d-inline-block py-2 px-4 mt-3 rounded mb-0">
                            <li><a href="index.html" class="text-dark">{{$user->settings['website_name_'.$lang]}}</a></li>
                            <li><a href="page-portfolio.html" class="text-dark">{{ __('site.projects') }}</a></li>
                            <li>
                                <span class="text-primary"> {{ __('site.projects_detail') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>  <!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->
    <!-- Home End -->

    <!-- Work Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                <!-- WORK START -->
                <div class="col-lg-7 col-md-6 order-2 order-md-1 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="row mr-lg-4">
                        <div class="col-lg-12">
                            <div class="work-details">
                                <h4 class="title mb-3 border-bottom pb-3">{{ __('site.project_name') }} : {{ $project['title_'.$lang] }}</h4>
                                <p class="text-muted mb-0">{{ $project['desc_'.$lang] }}</p>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-7 mt-4 pt-2">
                            <div class="work-details bg-light p-4">
                                <h4 class="title border-bottom pb-3 mb-3">{{ __('site.project_info') }} :</h4>
                                <ul class="list-unstyled mb-0">
                                    <li class="mt-3">
                                        <b>{{ __('site.client') }} :</b>
                                        <span>{{ $project['client_'.$lang] }}</span>
                                    </li>
                                    <li class="mt-3">
                                        <b>{{ __('site.category ') }} :</b>
                                        <span>{{ $project->category['name_'.$lang] }}</span>
                                    </li>
                                    <li class="mt-3">
                                        <b>{{ __('site.subject') }} :</b>
                                        <span>{{ $project['subject_'.$lang] }}</span>
                                    </li>
                                    <li class="mt-3">
                                        <b>{{ __('site.date') }} :</b>
                                        <span>{{ $project->date }}</span>
                                    </li>
                                    <li class="mt-3">
                                        <b>{{ __('site.link') }} :</b>
                                        <span><a href="{{ $project->website }}" target="_blank" class="text-primary">{{ $project->website }}</a></span>
                                    </li>
                                </ul>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end col-->

                <div class="col-lg-5 col-md-6 order-1 order-md-2">
                    <div class="port-images sticky-sidebar">
                        @if ($project->images)
                            @foreach ( $project->images as $index=>$image)
                            <div class="portfolio-box rounded shadow position-relative overflow-hidden {{ $index != 0 ? 'mt-4' : '' }}">
                                <div class="portfolio-box-img position-relative overflow-hidden">
                                    <img src="{{ asset('uploads/'.$image->image) }}" class="img-fluid">
                                    <div class="overlay-work">
                                        <div class="work-content text-center">
                                            <a href="{{ asset('uploads/'.$image->image) }}" class="text-light work-icon bg-dark d-inline-block rounded-pill mfp-image"><i data-feather="camera" class="fea icon-sm image-icon"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row mt-4 pt-2">
                <div class="col-12">
                    <ul class="pagination justify-content-center mb-0 list-unstyled">
                        <li><a href="{{ $project->previous($user->name) ? route('site.poroject', [str_replace(' ', '-', $user->name), $project->previous($user->name)->id]) : '#' }}" class="pr-3 pl-3 pt-2 pb-2"> <i class="mdi mdi-chevron-left"></i> {{ __('site.previous') }}</a></li>
                        <li><a href="{{ route('site.home',str_replace(' ', '-', $user->name)) }}" class="pr-3 pl-3 pt-2 pb-2"><i class="mdi mdi-home"></i> {{ __('site.home') }}</a></li>
                        <li><a href="{{ $project->next($user->name) ? route('site.poroject', [str_replace(' ', '-', $user->name), $project->next($user->name)->id]) : '#' }}" class="pr-3 pl-3 pt-2 pb-2">{{ __('site.next') }} <i class="mdi mdi-chevron-right"></i></a></li>
                    </ul><!--end pagination-->
                </div><!--end col-->
            </div>
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-detail text-center">
                        <div class="icon">
                            <i data-feather="phone" class="fea icon-md"></i>
                        </div>
                        <div class="content mt-4">
                            <h5 class="title text-uppercase">Phone</h5>
                            <p class="text-muted">Promising development turmoil inclusive education transformative community</p>
                            <a href="tel:+152534-468-854" class="text-primary">+152 534-468-854</a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-md-4 mt-4 mt-md-0 pt-2 pt-md-0">
                    <div class="contact-detail text-center">
                        <div class="icon">
                            <i data-feather="mail" class="fea icon-md"></i>
                        </div>
                        <div class="content mt-4">
                            <h5 class="title text-uppercase">Email</h5>
                            <p class="text-muted">Promising development turmoil inclusive education transformative community</p>
                            <a href="mailto:contact@example.com" class="text-primary">contact@example.com</a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="contact-detail text-center">
                        <div class="icon">
                            <i data-feather="map-pin" class="fea icon-md"></i>
                        </div>
                        <div class="content mt-4">
                            <h5 class="title text-uppercase">Location</h5>
                            <p class="text-muted">C/54 Northwest Freeway, Suite 558, <br>Houston, USA 485</p>
                            <a href="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6030.418742494061!2d-111.34563870463673!3d26.01036670629853!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1471908546569" class="video-play-icon text-primary">View on Google map</a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Contact End -->

@endsection

@push('page_scripts')
<!-- javascript -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/js/scrollspy.min.js') }}"></script>
<!-- SLIDER -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }} "></script>
<!-- Magnific Popup -->
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/magnific.init.js') }}"></script>
<!-- Feather icon -->
<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<!-- Main Js -->
<script src="{{ asset('assets/js/app.js') }}"></script>
@endpush
