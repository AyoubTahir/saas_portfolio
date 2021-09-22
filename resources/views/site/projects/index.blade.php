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
    <section class="bg-half d-table w-100" style="background: url({{ $randImage ? asset('uploads/'.$randImage) : asset('assets/images/home/bg-pages.jpg')}})center center;background-repeat: no-repeat;background-size: cover;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <h1 class="title" style="color: #ffc107 !important;text-transform: uppercase;letter-spacing: .4rem;"> {{ __('site.projects_and_works') }} </h1>
                        <ul class="page-next bg-light d-inline-block py-2 px-4 mt-3 rounded mb-0">
                            <li><a href="{{ route('site.home',str_replace(' ', '-', $user->name)) }}" class="text-dark">{{$user->settings['website_name_'.$lang]}}</a></li>
                            <li>
                                <span class="text-primary"> {{ __('site.projects') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>  <!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->
    <!-- Home End -->
    <!-- Projects Start -->
    <section class="section bg-light" id="projects">
        <div class="container">
            <div class="row mt-4 pt-2">
                <div class="col-lg-12">
                    <ul class="portfolioFilter text-center mb-0 list-unstyled">
                        <li class="list-inline-item mb-3"><a href="#" data-filter="*" class="active text-dark mr-2 py-2 px-3 rounded">{{ __('site.all') }}</a></li>
                        @if ($user->categories)
                            @foreach ( $user->categories as $category)
                                <li class="list-inline-item mb-3"><a href="#" data-filter=".{{ $category->name_en.$category->id }}" class="text-dark mr-2 py-2 px-3 rounded">{{ $category['name_'.$lang] }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div><!--end col-->
            </div><!--end row-->
            <div class="portfolioContainer row">
                @if ($user->categories)
                    @foreach ( $user->categories as $category)
                        @if($category->projects)
                            @foreach ( $category->projects as $index=>$project)
                                <div class="col-lg-4 col-md-6 mt-4 pt-2 {{ $category->name_en.$category->id }}">
                                    <div class="portfolio-box rounded shadow position-relative overflow-hidden">
                                        <div class="portfolio-box-img position-relative overflow-hidden">
                                            <img src="{{ $project->thumbnail ? asset('uploads/'.$project->thumbnail) : asset('assets/images/portfolio/1.jpg') }}" class="img-fluid" alt="member-image">
                                            <div class="overlay-work">
                                                <div class="work-content text-center">
                                                    <a href="{{ $project->thumbnail ? asset('uploads/'.$project->thumbnail) : asset('assets/images/portfolio/1.jpg') }}" class="text-light work-icon bg-dark d-inline-block rounded-pill mfp-image"><i data-feather="camera" class="fea icon-sm image-icon"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gallary-title py-4 text-center">
                                            <h5><a href="{{url()->current().'/'.$project->id}}" class="title text-dark">{{ $project['title_'.$lang] }}</a></h5>
                                            <span>{{ $category['name_'.$lang]}}</span>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            @endforeach
                        @endif
                    @endforeach
                @endif
            </div><!-- End row -->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Projects End -->

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
<script src="{{ asset('assets/js/isotope.js') }}"></script>
<script src="{{ asset('assets/js/portfolio-filter.js') }}"></script>
<script src="{{ asset('assets/js/magnific.init.js') }}"></script>
<!-- Feather icon -->
<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<!-- Main Js -->
<script src="{{ asset('assets/js/app.js') }}"></script>
@endpush
