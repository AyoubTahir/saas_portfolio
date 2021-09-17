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

<link href="{{ asset('assets/css/style'. $direction .'.css')}}" rel="stylesheet" type="text/css" id="theme-opt" />
<link href="{{ asset('assets/css/colors/default.css')}}" rel="stylesheet" id="color-opt">

@endsection

@section('content')

    <!-- HOME START-->
    <section class="bg-home d-table w-100" style="background-image:url('{{ asset('uploads/'. $user->hero['cover']) }}')" id="home">
        <div class="bg-overlay"></div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row mt-5 mt-sm-0 justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="title-heading">
                        <img src="{{ asset('uploads/'. $user->hero['image']) }}" class="img-fluid rounded-circle" alt="" style="width: 200px;">
                        <h3 class="heading text-light title-dark mt-3">{{ $user->hero['title_'.$lang] }} <span class="element text-primary" data-elements="{{ $user->hero['job_'.$lang] }}"></span></h3>
                        <p class="para-desc mx-auto text-white-50">{{ $user->hero['description_'.$lang] }}</p>
                        <div class="mt-4">
                            <a href="javascript:void(0)" class="btn btn-primary rounded">{{ $user->hero['button_'.$lang] }}</a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
        <a href="#about" data-scroll-nav="1" class="mouse-icon mouse-icon-white rounded-pill bg-transparent mouse-down">
            <span class="wheel position-relative d-block mover"></span>
        </a>
    </section><!--end section-->
    <!-- HOME END-->

    <!-- About Start -->
    <section class="section pb-3" id="about" style="{{ $user->about->status ? '' : 'display: none' }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-5">
                    <div class="about-hero">
                        <img src="{{ asset('uploads/'.$user->about->image) }}" class="img-fluid mx-auto d-block about-tween position-relative" alt="">
                    </div>
                </div><!--end col-->

                <div class="col-lg-7 col-md-7 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="section-title mb-0 ml-lg-5 ml-md-3">
                        <h4 class="title text-primary mb-3">{{ $user->about['full_name_'.$lang] }}</h4>
                        <h6 class="designation mb-3">{{ $user->about['sub_title_'.$lang] }} <span class="text-primary">{{ $user->about['job_'.$lang] }}</span></h6>
                        <p class="text-muted">{{ $user->about['description_'.$lang] }}</p>
                        <img src="{{ asset('assets/images/sign.png') }}" height="22" alt="">
                        <div class="mt-4">
                            <a href="#projects" class="btn btn-primary mouse-down">{{ $user->about['button_'.$lang] }}</a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60" style="{{  $user->interest && $user->interest->status ? '' : 'display: none' }}">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <div class="titles">
                            <h4 class="title title-line text-uppercase mb-4 pb-4">{{ $user->interest['title_'.$lang] }}</h4>
                            <span></span>
                        </div>
                        <p class="text-muted mx-auto para-desc mb-0">{{ $user->interest['description_'.$lang] }}</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                @if ($user->interest->interestField)
                    @foreach ( $user->interest->interestField as $field)
                    <div class="col-lg-3 col-md-4 col-12 mt-4 pt-2">
                        <div class="interests-desc bg-light position-relative px-2 py-3 rounded">
                            <div class="hobbies d-flex align-items-center">
                                <div class="text-center rounded-pill mr-4">
                                    <i data-feather="{{ $field->icon }}" class="icon fea icon-md-sm"></i>
                                </div>
                                <div class="content">
                                    <h6 class="title mb-0">{{ $field['name_'.$lang] }}</h6>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    @endforeach
                @endif
            </div>
        </div><!--end container-->

        <div class="container-fluid mt-100 mt-60" style="{{  $user->fact && $user->fact->status ? '' : 'display: none' }}">
            <div class="rounded py-md-5 py-4" style="background: url('{{ $user->fact->cover ? asset('uploads/'.$user->fact->cover) : asset('assets/images/bg-counter.jpg') }}') center center;">
                <div class="container">
                    <div class="row" id="counter">
                        @if($user->fact->factsField)
                            @foreach ( $user->fact->factsField as $field)
                                <div class="col-lg-3 col-6">
                                    <div class="counter-box rounded py-3 text-center">
                                        <div class="counter-icon">
                                            <i data-feather="{{ $field->icon }}" class="fea icon-md text-primary"></i>
                                        </div>
                                        <h3 class="counter-value mt-3 text-white title-dark" data-count="1251">{{ $field->number }}</h3>
                                        <h6 class="counter-head font-weight-normal mb-0 text-white title-dark">{{ $field['title_'.$lang] }}</h6>
                                    </div><!--end counter box-->
                                </div><!--end col-->
                            @endforeach
                        @endif
                    </div><!--end row-->
                </div><!--end container-->
            </div><!--end div-->
        </div><!--end container fluid-->
    </section>
    <!-- About end -->

    <!-- Services Start -->
    <section class="section bg-light" id="services" style="{{ $user->service->status ? '' : 'display: none' }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <div class="titles">
                            <h4 class="title title-line text-uppercase mb-4 pb-4">{{ $user->service['title_'.$lang]}}</h4>
                            <span></span>
                        </div>
                        <p class="text-muted mx-auto para-desc mb-0">{{ $user->service['description_'.$lang]}}</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                @if ($user->service->servicesField)
                    @foreach ( $user->service->servicesField as $field )
                        <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                            <div class="service-wrapper rounded position-relative text-center border border-footer p-4 pt-5 pb-5">
                                <div class="icon text-primary">
                                    <i data-feather="{{ $field->icon }}" class="fea icon-md"></i>
                                </div>
                                <div class="content mt-4">
                                    <h5 class="title">{{ $field['name_'.$lang] }}</h5>
                                    <p class="text-muted mt-3 mb-0">{{ $field['desc_'.$lang] }}</p>
                                </div>
                                <div class="big-icon">
                                    <i data-feather="{{ $field->icon }}" class="fea icons"></i>
                                </div>
                            </div>
                        </div><!--end col-->
                    @endforeach
                @endif

            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!-- Services End -->

    <!-- Resume Start -->
    <section class="section" id="resume" style="{{ $user->resume->status ? '' : 'display: none' }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <div class="titles">
                            <h4 class="title title-line text-uppercase mb-4 pb-4">{{ $user->resume['title_'.$lang] }}</h4>
                            <span></span>
                        </div>
                        <p class="text-muted mx-auto para-desc mb-0">{{ $user->resume['description_'.$lang] }}</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-12">
                    <div class="main-icon rounded-pill text-center mt-4 pt-2">
                        <i data-feather="star" class="fea icon-md-sm"></i>
                    </div>
                    <div class="timeline-page pt-2 position-relative">
                        @if ($user->resume->resumesField)
                            @foreach ( $user->resume->resumesField as $index=>$field )
                                <div class="timeline-item mt-4">
                                    <div class="row">
                                        @if($index % 2 == 0)
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="duration date-label-left border rounded p-2 pl-4 pr-4 position-relative shadow text-left">{{ date('Y', strtotime($field->date_from)) }} - {{ date('Y', strtotime($field->date_to)) }}</div>
                                            </div><!--end col-->
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="event event-description-right rounded p-4 border float-left text-left">
                                                    <h5 class="title mb-0 text-capitalize">{{ $field['name_'.$lang] }}</h5>
                                                    <small class="company">{{ $field['job_'.$lang] }}</small>
                                                    <p class="timeline-subtitle mt-3 mb-0 text-muted">{{ $field['desc_'.$lang] }}</p>
                                                </div>
                                            </div><!--end col-->
                                        @else
                                            <div class="col-lg-6 col-md-6 col-sm-6 order-sm-1 order-2">
                                                <div class="event event-description-left rounded p-4 border float-left text-right">
                                                    <h5 class="title mb-0 text-capitalize">{{ $field['name_'.$lang] }}</h5>
                                                    <small class="company">{{ $field['job_'.$lang] }}</small>
                                                    <p class="timeline-subtitle mt-3 mb-0 text-muted">{{ $field['desc_'.$lang] }}</p>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-lg-6 col-md-6 col-sm-6 order-sm-2 order-1">
                                                <div class="duration duration-right rounded border p-2 pl-4 pr-4 position-relative shadow text-left">{{ date('Y', strtotime($field->date_from)) }} - {{ date('Y', strtotime($field->date_to)) }}</div>
                                            </div><!--end col-->
                                        @endif
                                    </div><!--end row-->
                                </div><!--end timeline item-->
                            @endforeach
                        @endif
                    </div><!--end timeline page-->
                    <!-- TIMELINE END -->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Skill End -->

    <!-- Skill & CTA START -->
    <section class="cta-full border-top">
        <div class="container-fluid">
            <div class="row position-relative">
                <div class="col-lg-4 padding-less img" style="background-image:url('{{ asset('assets/images/skills.jpg') }}')" data-jarallax='{"speed": 0.5}'></div><!-- end col -->
                <div class="col-lg-8 offset-lg-4">
                    <div class="cta-full-img-box">
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <div class="section-title">
                                    <div class="titles">
                                        <h4 class="title title-line text-uppercase mb-4 pb-4">Work Expertise</h4>
                                        <span></span>
                                    </div>
                                    <p class="text-muted mx-auto para-desc mb-0">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-4 col-12">
                                <ul class="nav nav-pills flex-column px-0" id="pills-tab" role="tablist">
                                    <li class="nav-item mt-4 pt-2">
                                        <a class="nav-link rounded active" id="pills-cloud-tab" data-toggle="pill" href="#pills-cloud" role="tab" aria-controls="pills-cloud" aria-selected="false">
                                            <div class="skill-container text-center pt-1 pb-1">
                                                <h6 class="title mb-0">UX Design</h6>
                                            </div>
                                        </a><!--end nav link-->
                                    </li><!--end nav item-->

                                    <li class="nav-item mt-4 pt-2">
                                        <a class="nav-link rounded" id="pills-smart-tab" data-toggle="pill" href="#pills-smart" role="tab" aria-controls="pills-smart" aria-selected="false">
                                            <div class="skill-container text-center pt-1 pb-1">
                                                <h6 class="title mb-0">Language Skill</h6>
                                            </div>
                                        </a><!--end nav link-->
                                    </li><!--end nav item-->

                                    <li class="nav-item mt-4 pt-2">
                                        <a class="nav-link rounded" id="pills-apps-tab" data-toggle="pill" href="#pills-apps" role="tab" aria-controls="pills-apps" aria-selected="false">
                                            <div class="skill-container text-center pt-1 pb-1">
                                                <h6 class="title mb-0">Web development</h6>
                                            </div>
                                        </a><!--end nav link-->
                                    </li><!--end nav item-->
                                </ul><!--end nav pills-->
                            </div><!--end col-->

                            <div class="col-lg-9 col-md-8 col-12">
                                <div class="tab-content pl-lg-4" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-cloud" role="tabpanel" aria-labelledby="pills-cloud-tab">
                                        <div class="progress-box mt-4 pt-2">
                                            <h6 class="font-weight-normal">HTML</h6>
                                            <div class="progress">
                                                <div class="progress-bar position-relative bg-primary" style="width:84%;">
                                                    <div class="progress-value d-block text-dark h6">84%</div>
                                                </div>
                                            </div>
                                        </div><!--end process box-->
                                        <div class="progress-box mt-4 pt-2">
                                            <h6 class="font-weight-normal">CSS</h6>
                                            <div class="progress">
                                                <div class="progress-bar position-relative bg-primary" style="width:75%;">
                                                    <div class="progress-value d-block text-dark h6">75%</div>
                                                </div>
                                            </div>
                                        </div><!--end process box-->
                                        <div class="progress-box mt-4 pt-2">
                                            <h6 class="font-weight-normal">JQuery</h6>
                                            <div class="progress">
                                                <div class="progress-bar position-relative bg-primary" style="width:79%;">
                                                    <div class="progress-value d-block text-dark h6">79%</div>
                                                </div>
                                            </div>
                                        </div><!--end process box-->
                                    </div><!--end teb pane-->

                                    <div class="tab-pane fade" id="pills-smart" role="tabpanel" aria-labelledby="pills-smart-tab">
                                        <div class="progress-box mt-4 pt-2">
                                            <h6 class="font-weight-normal">English</h6>
                                            <div class="progress">
                                                <div class="progress-bar position-relative bg-primary" style="width:84%;">
                                                    <div class="progress-value d-block text-dark h6">84%</div>
                                                </div>
                                            </div>
                                        </div><!--end process box-->
                                        <div class="progress-box mt-4 pt-2">
                                            <h6 class="font-weight-normal">Spanish</h6>
                                            <div class="progress">
                                                <div class="progress-bar position-relative bg-primary" style="width:75%;">
                                                    <div class="progress-value d-block text-dark h6">75%</div>
                                                </div>
                                            </div>
                                        </div><!--end process box-->
                                        <div class="progress-box mt-4 pt-2">
                                            <h6 class="font-weight-normal">German</h6>
                                            <div class="progress">
                                                <div class="progress-bar position-relative bg-primary" style="width:79%;">
                                                    <div class="progress-value d-block text-dark h6">79%</div>
                                                </div>
                                            </div>
                                        </div><!--end process box-->
                                    </div><!--end teb pane-->

                                    <div class="tab-pane fade" id="pills-apps" role="tabpanel" aria-labelledby="pills-apps-tab">
                                        <div class="progress-box mt-4 pt-2">
                                            <h6 class="font-weight-normal">Photoshop</h6>
                                            <div class="progress">
                                                <div class="progress-bar position-relative bg-primary" style="width:84%;">
                                                    <div class="progress-value d-block text-dark h6">84%</div>
                                                </div>
                                            </div>
                                        </div><!--end process box-->
                                        <div class="progress-box mt-4 pt-2">
                                            <h6 class="font-weight-normal">Sketch</h6>
                                            <div class="progress">
                                                <div class="progress-bar position-relative bg-primary" style="width:75%;">
                                                    <div class="progress-value d-block text-dark h6">75%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end teb pane-->
                                </div><!--end tab content-->
                            </div><!--end col-->
                        </div> <!-- end row -->
                    </div> <!-- end about detail -->
                </div> <!-- end col -->
            </div><!--end row-->
        </div><!--end container fluid-->
    </section><!--end section-->
    <!-- Skill & CTA End -->

    <!-- Projects End -->
    <section class="section bg-light" id="projects">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <div class="titles">
                            <h4 class="title title-line text-uppercase mb-4 pb-4">My Portfolio</h4>
                            <span></span>
                        </div>
                        <p class="text-muted mx-auto para-desc mb-0">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>

        <div class="container">
            <div class="row mt-4 pt-2">
                <div class="col-lg-12">
                    <ul class="portfolioFilter text-center mb-0 list-unstyled">
                        <li class="list-inline-item mb-3"><a href="#" data-filter="*" class="active text-dark mr-2 py-2 px-3 rounded">All</a></li>
                        <li class="list-inline-item mb-3"><a href="#" data-filter=".natural" class="text-dark mr-2 py-2 px-3 rounded">Natural</a></li>
                        <li class="list-inline-item mb-3"><a href="#" data-filter=".creative" class="text-dark mr-2 py-2 px-3 rounded">Creative</a></li>
                        <li class="list-inline-item mb-3"><a href="#" data-filter=".personal" class="text-dark mr-2 py-2 px-3 rounded">Personal</a></li>
                        <li class="list-inline-item mb-3"><a href="#" data-filter=".photography" class="text-dark mr-2 py-2 px-3 rounded">Photography</a></li>
                    </ul>
                </div><!--end col-->
            </div><!--end row-->

            <div class="portfolioContainer row">
                <div class="col-lg-4 col-md-6 mt-4 pt-2 natural personal">
                    <div class="portfolio-box rounded shadow position-relative overflow-hidden">
                        <div class="portfolio-box-img position-relative overflow-hidden">
                            <img src="{{ asset('assets/images/portfolio/1.jpg') }}" class="img-fluid" alt="member-image">
                            <div class="overlay-work">
                                <div class="work-content text-center">
                                    <a href="{{ asset('assets/images/portfolio/1.jpg') }}" class="text-light work-icon bg-dark d-inline-block rounded-pill mfp-image"><i data-feather="camera" class="fea icon-sm image-icon"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="gallary-title py-4 text-center">
                            <h5><a href="page-portfolio-detail.html" class="title text-dark">The Usefulness</a></h5>
                            <span>Photography</span>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 pt-2 creative personal photography">
                    <div class="portfolio-box rounded shadow position-relative overflow-hidden">
                        <div class="portfolio-box-img position-relative overflow-hidden">
                            <img src="{{ asset('assets/images/portfolio/2.jpg') }}" class="img-fluid" alt="member-image">
                            <div class="overlay-work">
                                <div class="work-content text-center">
                                    <a href="http://vimeo.com/287684225" class="play-btn video-play-icon text-light work-icon bg-dark d-inline-block rounded-pill"><i data-feather="video" class="fea icon-sm image-icon"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="gallary-title py-4 text-center">
                            <h5><a href="page-portfolio-detail.html" class="title text-dark">The Nonsensical content</a></h5>
                            <span>Illustrations</span>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 pt-2 natural creative">
                    <div class="portfolio-box rounded shadow position-relative overflow-hidden">
                        <div class="portfolio-box-img position-relative overflow-hidden">
                            <img src="{{ asset('assets/images/portfolio/4.jpg') }}" class="img-fluid" alt="member-image">
                            <div class="overlay-work">
                                <div class="work-content text-center">
                                    <a href="{{ asset('assets/images/portfolio/4.jpg') }}" class="text-light work-icon bg-dark d-inline-block rounded-pill mfp-image"><i data-feather="camera" class="fea icon-sm image-icon"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="gallary-title py-4 text-center">
                            <h5><a href="page-portfolio-detail.html" class="title text-dark">Prevents Patterns</a></h5>
                            <span>Corrporate</span>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 pt-2  personal photography">
                    <div class="portfolio-box rounded shadow position-relative overflow-hidden">
                        <div class="portfolio-box-img position-relative overflow-hidden">
                            <img src="{{ asset('assets/images/portfolio/6.jpg') }}" class="img-fluid" alt="member-image">
                            <div class="overlay-work">
                                <div class="work-content text-center">
                                    <a href="{{ asset('assets/images/portfolio/6.jpg') }}" class="text-light work-icon bg-dark d-inline-block rounded-pill mfp-image"><i data-feather="camera" class="fea icon-sm image-icon"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="gallary-title py-4 text-center">
                            <h5><a href="page-portfolio-detail.html" class="title text-dark">The Advantageous</a></h5>
                            <span>Graphics</span>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 pt-2 creative photography">
                    <div class="portfolio-box rounded shadow position-relative overflow-hidden">
                        <div class="portfolio-box-img position-relative overflow-hidden">
                            <img src="{{ asset('assets/images/portfolio/3.jpg') }}" class="img-fluid" alt="member-image">
                            <div class="overlay-work">
                                <div class="work-content text-center">
                                    <a href="http://vimeo.com/287684225" class="play-btn video-play-icon text-light work-icon bg-dark d-inline-block rounded-pill"><i data-feather="video" class="fea icon-sm image-icon"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="gallary-title py-4 text-center">
                            <h5><a href="page-portfolio-detail.html" class="title text-dark">Automatic Recognition</a></h5>
                            <span>Web Design</span>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 pt-2 natural creative">
                    <div class="portfolio-box rounded shadow position-relative overflow-hidden">
                        <div class="portfolio-box-img position-relative overflow-hidden">
                            <img src="{{ asset('assets/images/portfolio/5.jpg') }}" class="img-fluid" alt="member-image">
                            <div class="overlay-work">
                                <div class="work-content text-center">
                                    <a href="{{ asset('assets/images/portfolio/5.jpg') }}" class="text-light work-icon bg-dark d-inline-block rounded-pill mfp-image"><i data-feather="camera" class="fea icon-sm image-icon"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="gallary-title py-4 text-center">
                            <h5><a href="page-portfolio-detail.html" class="title text-dark"> Ius Dissentiunt </a></h5>
                            <span>Devlopment</span>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!-- End row -->

            <div class="row">
                <div class="col-lg-12 mt-4 pt-2">
                    <div class="text-center">
                        <a href="page-portfolio.html" class="btn btn-outline-primary">More works <i data-feather="refresh-cw" class="fea icon-sm"></i></a>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Projects End -->

    <!-- Testimonial Start -->
    <section class="cta-full">
        <div class="container-fluid">
            <div class="row position-relative">
                <div class="col-lg-8 order-2">
                    <div class="cta-full-img-box">
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <div class="section-title">
                                    <div class="titles">
                                        <h4 class="title title-line text-uppercase mb-4 pb-4">Clients say</h4>
                                        <span></span>
                                    </div>
                                    <p class="text-muted mx-auto para-desc mb-0">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                        <div class="row">
                            <div class="col-12">
                                <div id="clients-testi" class="owl-carousel mt-3">
                                    <!--Start Client-->
                                    <div class="client-review border rounded m-3 mb-4 position-relative shadow">
                                        <div class="review-star">
                                            <ul class="list-unstyled float-right mb-0">
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                            </ul>

                                            <div class="review-base">
                                                <h6 class="title">" Design Quality "</h6>
                                            </div>
                                        </div><!--end review star-->

                                        <p class="text-muted review-para font-italic mt-3 mb-3">There are many variations of passages of Lorem Ipsum available, by injected humour, or randomised words which don't look even slightly believable. </p>
                                        <div class="reviewer d-flex align-items-center">
                                            <img src="{{ asset('assets/images/client/01.jpg') }}" class="img-fluid rounded-circle avatar avatar-small mr-3" alt="">
                                            <div class="content">
                                                <h5 class="name mb-0">Erich Bissonette</h5>
                                                <small class="designation text-muted">Oppo</small>
                                            </div>
                                        </div><!--end reviewer-->
                                    </div><!--end client review-->
                                    <!--End Client-->

                                    <!--Start Client-->
                                    <div class="client-review border rounded m-3 mb-4 position-relative shadow">
                                        <div class="review-star">
                                            <ul class="list-unstyled float-right mb-0">
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star-half"></i></li>
                                            </ul>

                                            <div class="review-base">
                                                <h6 class="title">" Code Quality "</h6>
                                            </div>
                                        </div><!--end review star-->

                                        <p class="text-muted review-para font-italic mt-3 mb-3">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                        <div class="reviewer d-flex align-items-center">
                                            <img src="{{ asset('assets/images/client/02.jpg') }}" class="img-fluid rounded-circle avatar avatar-small mr-3" alt="">
                                            <div class="content">
                                                <h5 class="name mb-0">Tina Meyer</h5>
                                                <small class="designation text-muted">Vivo</small>
                                            </div>
                                        </div><!--end reviewer-->
                                    </div><!--end client review-->
                                    <!--End Client-->

                                    <!--Start Client-->
                                    <div class="client-review border rounded m-3 mb-4 position-relative shadow">
                                        <div class="review-star">
                                            <ul class="list-unstyled float-right mb-0">
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                            </ul>

                                            <div class="review-base">
                                                <h6 class="title">" Feature Availability "</h6>
                                            </div>
                                        </div><!--end review star-->

                                        <p class="text-muted review-para font-italic mt-3 mb-3">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                        <div class="reviewer d-flex align-items-center">
                                            <img src="{{ asset('assets/images/client/03.jpg') }}" class="img-fluid rounded-circle avatar avatar-small mr-3" alt="">
                                            <div class="content">
                                                <h5 class="name mb-0">Sharon Murdock</h5>
                                                <small class="designation text-muted">Apple</small>
                                            </div>
                                        </div><!--end reviewer-->
                                    </div><!--end client review-->
                                    <!--End Client-->

                                    <!--Start Client-->
                                    <div class="client-review border rounded m-3 mb-4 position-relative shadow">
                                        <div class="review-star">
                                            <ul class="list-unstyled float-right mb-0">
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                            </ul>

                                            <div class="review-base">
                                                <h6 class="title">" Customizability "</h6>
                                            </div>
                                        </div><!--end review star-->

                                        <p class="text-muted review-para font-italic mt-3 mb-3">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                                        <div class="reviewer d-flex align-items-center">
                                            <img src="{{ asset('assets/images/client/04.jpg') }}" class="img-fluid rounded-circle avatar avatar-small mr-3" alt="">
                                            <div class="content">
                                                <h5 class="name mb-0">Jesse Hunt</h5>
                                                <small class="designation text-muted">Samsung</small>
                                            </div>
                                        </div><!--end reviewer-->
                                    </div><!--end client review-->
                                    <!--End Client-->

                                    <!--Start Client-->
                                    <div class="client-review border rounded m-3 mb-4 position-relative shadow">
                                        <div class="review-star">
                                            <ul class="list-unstyled float-right mb-0">
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star-half"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star-outline"></i></li>
                                            </ul>

                                            <div class="review-base">
                                                <h6 class="title">" Flexibility "</h6>
                                            </div>
                                        </div><!--end review star-->

                                        <p class="text-muted review-para font-italic mt-3 mb-3">There are many variations of passages of Lorem Ipsum available, by injected humour, or randomised words which don't look even slightly believable. </p>
                                        <div class="reviewer d-flex align-items-center">
                                            <img src="{{ asset('assets/images/client/05.jpg') }}" class="img-fluid rounded-circle avatar avatar-small mr-3" alt="">
                                            <div class="content">
                                                <h5 class="name mb-0">Andrea Toy</h5>
                                                <small class="designation text-muted">Nokia</small>
                                            </div>
                                        </div><!--end reviewer-->
                                    </div><!--end client review-->
                                    <!--End Client-->

                                    <!--Start Client-->
                                    <div class="client-review border rounded m-3 mb-4 position-relative shadow">
                                        <div class="review-star">
                                            <ul class="list-unstyled float-right mb-0">
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                            </ul>

                                            <div class="review-base">
                                                <h6 class="title">" Development "</h6>
                                            </div>
                                        </div><!--end review star-->

                                        <p class="text-muted review-para font-italic mt-3 mb-3"> It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
                                        <div class="reviewer d-flex align-items-center">
                                            <img src="{{ asset('assets/images/client/06.jpg') }}" class="img-fluid rounded-circle avatar avatar-small mr-3" alt="">
                                            <div class="content">
                                                <h5 class="name mb-0">Jay Allums</h5>
                                                <small class="designation text-muted">RedMI</small>
                                            </div>
                                        </div><!--end reviewer-->
                                    </div><!--end client review-->
                                    <!--End Client-->
                                </div><!--end testi review-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div> <!-- end about detail -->
                </div> <!-- end col -->

                <div class="col-lg-4 offset-lg-8 padding-less img order-1" style="background-image:url('{{ asset('assets/images/testi.jpg') }}')" data-jarallax='{"speed": 0.5}'></div><!-- end col -->
            </div><!--end row-->
        </div><!--end container fluid-->
    </section><!--end section-->
    <!-- Testimonial End -->

    <!-- Blog Start -->
    <section class="section bg-light pb-3" id="news">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <div class="titles">
                            <h4 class="title title-line text-uppercase mb-4 pb-4">Latest News & Blog</h4>
                            <span></span>
                        </div>
                        <p class="text-muted mx-auto para-desc mb-0">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="blog-post rounded shadow">
                        <img src="{{ asset('assets/images/blog/01.jpg') }}" class="img-fluid rounded-top" alt="">
                        <div class="content pt-4 pb-4 p-3">
                            <ul class="list-unstyled d-flex justify-content-between post-meta">
                                        <li><i data-feather="user" class="fea icon-sm mr-1"></i><a href="javascript:void(0)" class="text-dark">Cristino</a></li>
                                        <li><i data-feather="tag" class="fea icon-sm mr-1"></i><a href="javascript:void(0)" class="text-dark">Branding</a></li>
                                    </ul>
                            <h5 class="mb-3"><a href="page-blog-detail.html" class="title text-dark">Our Home Entertainment has Evolved Significantly</a></h5>
                            <ul class="list-unstyled mb-0 pt-3 border-top d-flex justify-content-between">
                                <li><a href="javascript:void(0)" class="text-dark">Read More <i data-feather="chevron-right" class="fea icon-sm"></i></a></li>
                                <li><i class="mdi mdi-calendar-edit mr-1"></i>10th April, 2020</li>
                            </ul>
                        </div><!--end content-->
                    </div><!--end blog post-->
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="blog-post rounded shadow">
                        <img src="{{ asset('assets/images/blog/02.jpg') }}" class="img-fluid rounded-top" alt="">
                        <div class="content pt-4 pb-4 p-3">
                            <ul class="list-unstyled d-flex justify-content-between post-meta">
                                        <li><i data-feather="user" class="fea icon-sm mr-1"></i><a href="javascript:void(0)" class="text-dark">Cristino</a></li>
                                        <li><i data-feather="tag" class="fea icon-sm mr-1"></i><a href="javascript:void(0)" class="text-dark">Branding</a></li>
                                    </ul>
                            <h5 class="mb-3"><a href="page-blog-detail.html" class="title text-dark">These Are The Voyages of The Starship Enterprise</a></h5>
                            <ul class="list-unstyled mb-0 pt-3 border-top d-flex justify-content-between">
                                <li><a href="javascript:void(0)" class="text-dark">Read More <i data-feather="chevron-right" class="fea icon-sm"></i></a></li>
                                <li><i class="mdi mdi-calendar-edit mr-1"></i>10th April, 2020</li>
                            </ul>
                        </div><!--end content-->
                    </div><!--end blog post-->
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="blog-post rounded shadow">
                        <img src="{{ asset('assets/images/blog/03.jpg') }}" class="img-fluid rounded-top" alt="">
                        <div class="content pt-4 pb-4 p-3">
                            <ul class="list-unstyled d-flex justify-content-between post-meta">
                                        <li><i data-feather="user" class="fea icon-sm mr-1"></i><a href="javascript:void(0)" class="text-dark">Cristino</a></li>
                                        <li><i data-feather="tag" class="fea icon-sm mr-1"></i><a href="javascript:void(0)" class="text-dark">Branding</a></li>
                                    </ul>
                            <h5 class="mb-3"><a href="page-blog-detail.html" class="title text-dark">Three Reasons Visibility Matters in Supply Chain</a></h5>
                            <ul class="list-unstyled mb-0 pt-3 border-top d-flex justify-content-between">
                                <li><a href="javascript:void(0)" class="text-dark">Read More <i data-feather="chevron-right" class="fea icon-sm"></i></a></li>
                                <li><i class="mdi mdi-calendar-edit mr-1"></i>10th April, 2020</li>
                            </ul>
                        </div><!--end content-->
                    </div><!--end blog post-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container-fluid mt-100 mt-60">
            <div class="rounded-pill py-5" style="background: url('{{ asset('assets/images/hireme.jpg') }}') center center;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                            <h4 class="text-light title-dark">I Am Available For Freelancer Projects.</h4>
                            <p class="text-white-50 mx-auto mt-4 para-desc">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                            <div class="mt-4">
                                <a href="#contact" class="btn btn-primary mouse-down">Hire me <i data-feather="chevron-down" class="fea icon-sm"></i></a>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </div><!--end div-->
        </div><!--end container fluid-->
    </section><!--end section-->
    <!-- Blog Start -->

    <!-- Contact Start -->
    <section class="section pb-0" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <div class="titles">
                            <h4 class="title title-line text-uppercase mb-4 pb-4">Contact Me</h4>
                            <span></span>
                        </div>
                        <p class="text-muted mx-auto para-desc mb-0">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-md-4 mt-4 pt-2">
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

                <div class="col-md-4 mt-4 pt-2">
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

                <div class="col-md-4 mt-4 pt-2">
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

    <section class="section pt-5 mt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="custom-form mb-sm-30">
                        <div id="message"></div>
                        <form method="post" action="php/contact.php" name="contact-form" id="contact-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6">
                                            <div class="form-group">
                                                <input name="name" id="name" type="text" class="form-control border rounded" placeholder="First Name :">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-12 col-md-6">
                                            <div class="form-group">
                                                <input name="email" id="email" type="email" class="form-control border rounded" placeholder="Your email :">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input name="subject" id="subject" class="form-control border rounded" placeholder="Your subject :">
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div><!--end col-->

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <textarea name="comments" id="comments" rows="4" class="form-control border rounded" placeholder="Your Message :"></textarea>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary" value="Send Message">
                                    <div id="simple-msg"></div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form><!--end form-->
                    </div><!--end custom-form-->
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
<script src="{{ asset('assets/js/isotope.js') }}"></script>
<script src="{{ asset('assets/js/portfolio-filter.js') }}"></script>
<script src="{{ asset('assets/js/magnific.init.js') }}"></script>
<!-- Contact -->
<script src="{{ asset('assets/js/contact.js') }}"></script>
<!-- Counter -->
<script src="{{ asset('assets/js/counter.init.js') }}"></script>
<!-- Tweenmax Js -->
<script src="{{ asset('assets/js/jquery-twennmax.js') }}"></script>
<script src="{{ asset('assets/js/TweenMax.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-twennmax.init.js') }}"></script>
<!-- Feather icon -->
<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<!--Partical js-->
<script src="{{ asset('assets/js/particles.js') }}"></script>
<script src="{{ asset('assets/js/particles.app.js') }}"></script>
<!-- Typed -->
<script src="{{ asset('assets/js/typed.js') }}"></script>
<script src="{{ asset('assets/js/typed.init.js') }}"></script>
<!-- Main Js -->
<script src="{{ asset('assets/js/app.js') }}"></script>
@endpush
