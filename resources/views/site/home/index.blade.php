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
<?php $direction = session()->get('currentLang') == 'en' ? '' : '-rtl'; ?>
<?php $mode = $user->settings && $user->settings->theme_mode == 0 ? '-dark' : ''; ?>
<link href="{{ asset('assets/css/style'. $mode . $direction .'.css')}}" rel="stylesheet" type="text/css" id="theme-opt" />
<link href="{{ asset('assets/css/colors/default.css')}}" rel="stylesheet" id="color-opt">

@endsection

@section('content')

    <!-- HOME START-->
    <section class="bg-home d-table w-100" style="background-image:url('{{ $user->hero ? asset('uploads/'. $user->hero['cover']) : asset('assets/images/home/02.jpg') }}')" id="home">
        <div class="bg-overlay"></div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row mt-5 mt-sm-0 justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="title-heading">
                        <img src="{{ $user->hero ? asset('uploads/'. $user->hero['image']) : asset('assets/images/home/hero.jpg') }}" class="img-fluid rounded-circle" alt="" style="width: 200px;">
                        <h3 class="heading text-light title-dark mt-3">{{ $user->hero['title_'.$lang] }} <span class="element text-primary" data-elements="{{ $user->hero['job_'.$lang] }}"></span></h3>
                        <p class="para-desc mx-auto text-white-50">{{ $user->hero['description_'.$lang] }}</p>
                        <div class="mt-4">
                            <a href="#contact" class="btn btn-primary rounded">{{ $user->hero['button_'.$lang] }}</a>
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
    <section class="section pb-3" id="about" style="{{ $user->about && $user->about->status ? '' : 'display: none' }}">
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
                                        <h3 class="counter-value mt-3 text-white title-dark" data-count="{{ $field->number }}">{{ $field->number }}</h3>
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
    <section class="section bg-light" id="services" style="{{ $user->service && $user->service->status ? '' : 'display: none' }}">
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
    <section class="section" id="resume" style="{{ $user->resume && $user->resume->status ? '' : 'display: none' }}">
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
    <section class="cta-full border-top" style="{{ $user->expertise && $user->expertise->status ? '' : 'display: none' }}">
        <div class="container-fluid">
            <div class="row position-relative">
                <div class="col-lg-4 padding-less img" style="background-image:url('{{ asset('uploads/'. $user->expertise->image) }}')" data-jarallax='{"speed": 0.5}'></div><!-- end col -->
                <div class="col-lg-8 offset-lg-4">
                    <div class="cta-full-img-box">
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <div class="section-title">
                                    <div class="titles">
                                        <h4 class="title title-line text-uppercase mb-4 pb-4">{{$user->expertise['title_'.$lang]}}</h4>
                                        <span></span>
                                    </div>
                                    <p class="text-muted mx-auto para-desc mb-0">{{$user->expertise['description_'.$lang]}}</p>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-4 col-12">
                                <ul class="nav nav-pills flex-column px-0" id="pills-tab" role="tablist">
                                    @foreach ($user->expertise->expertisesField as $index=>$field)
                                    <li class="nav-item mt-4 pt-2">
                                        <a class="nav-link rounded {{$index == 0 ? 'active':''}}" id="pills-id{{$field->id}}-tab" data-toggle="pill" href="#pills-id{{$field->id}}" role="tab" aria-controls="pills-id{{$field->id}}" aria-selected="false">
                                            <div class="skill-container text-center pt-1 pb-1">
                                                <h6 class="title mb-0">{{$field['name_'.$lang]}}</h6>
                                            </div>
                                        </a><!--end nav link-->
                                    </li><!--end nav item-->
                                    @endforeach
                                </ul><!--end nav pills-->
                            </div><!--end col-->

                            <div class="col-lg-9 col-md-8 col-12">
                                <div class="tab-content pl-lg-4" id="pills-tabContent">
                                    @foreach ($user->expertise->expertisesField as $index=>$field)
                                    <div class="tab-pane fade {{$index == 0 ? 'show active':''}}" id="pills-id{{$field->id}}" role="tabpanel" aria-labelledby="pills-id{{$field->id}}-tab">
                                        @foreach ($field->skills as $skill)
                                        <div class="progress-box mt-4 pt-2">
                                            <h6 class="font-weight-normal">{{$skill['skill_'.$lang]}}</h6>
                                            <div class="progress">
                                                <div class="progress-bar position-relative bg-primary" style="width:{{ $skill->lvl }}%;">
                                                    <div class="progress-value d-block text-dark h6">{{ $skill->lvl }}%</div>
                                                </div>
                                            </div>
                                        </div><!--end process box-->
                                        @endforeach
                                    </div><!--end teb pane-->
                                    @endforeach
                                </div><!--end tab content-->
                            </div><!--end col-->
                        </div> <!-- end row -->
                    </div> <!-- end about detail -->
                </div> <!-- end col -->
            </div><!--end row-->
        </div><!--end container fluid-->
    </section><!--end section-->
    <!-- Skill & CTA End -->

    @if ($user->portfolio)
    <!-- Projects Start -->
    <section class="section bg-light" id="projects" style="{{ $user->portfolio && $user->portfolio->status ? '' : 'display: none' }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <div class="titles">
                            <h4 class="title title-line text-uppercase mb-4 pb-4">{{ $user->portfolio['title_'.$lang] }}</h4>
                            <span></span>
                        </div>
                        <p class="text-muted mx-auto para-desc mb-0">{{ $user->portfolio['desc_'.$lang] }}</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>

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
                                @if ( $index < 6 )
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
                                            <h5><a href="{{url()->current().'/projects'.'/'.$project->id}}" class="title text-dark">{{ $project['title_'.$lang] }}</a></h5>
                                            <span>{{ $category['name_'.$lang]}}</span>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            </div><!-- End row -->

            <div class="row">
                <div class="col-lg-12 mt-4 pt-2">
                    <div class="text-center">
                        <a href="{{ route('site.porojects',str_replace(' ', '-', $user->name))}}" class="btn btn-outline-primary">{{__('site.more')}} <i data-feather="refresh-cw" class="fea icon-sm"></i></a>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Projects End -->
    @endif

    <!-- Testimonial Start -->
    <section class="cta-full" style="{{ $user->clients && $user->clients->status ? '' : 'display: none' }}">
        <div class="container-fluid">
            <div class="row position-relative">
                <div class="col-lg-8 order-2">
                    <div class="cta-full-img-box">
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <div class="section-title">
                                    <div class="titles">
                                        <h4 class="title title-line text-uppercase mb-4 pb-4">{{$user->clients['title_'.$lang]}}</h4>
                                        <span></span>
                                    </div>
                                    <p class="text-muted mx-auto para-desc mb-0">{{$user->clients['desc_'.$lang]}}</p>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                        <div class="row">
                            <div class="col-12">
                                <div id="clients-testi" class="owl-carousel mt-3">
                                    @if ($user->clients->clientsField)
                                        @foreach ( $user->clients->clientsField as $client )
                                            <!--Start Client-->
                                            <div class="client-review border rounded m-3 mb-4 position-relative shadow">
                                                <div class="review-star">
                                                    <ul class="list-unstyled float-right mb-0">
                                                        @for ($i = 0; $i < 5 ; $i++)
                                                            @if(($client->rating) % 2 == 1 && $client->rating == ($i*2)+1)
                                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star-half"></i></li>
                                                            @elseif($i < $client->rating/2)
                                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star"></i></li>
                                                            @else
                                                                <li class="list-inline-item text-primary"><i class="mdi mdi-star-outline"></i></li>
                                                            @endif
                                                        @endfor
                                                    </ul>

                                                    <div class="review-base">
                                                        <h6 class="title">" {{ $client['project_'.$lang] }} "</h6>
                                                    </div>
                                                </div><!--end review star-->

                                                <p class="text-muted review-para font-italic mt-3 mb-3">{{ $client['opinion_'.$lang] }}</p>
                                                <div class="reviewer d-flex align-items-center">
                                                    <img src="{{ $client->image ?  asset('uploads/'.$client->image) : asset('assets/images/client/01.jpg') }}" class="img-fluid rounded-circle avatar avatar-small mr-3" alt="">
                                                    <div class="content">
                                                        <h5 class="name mb-0">{{ $client['name_'.$lang] }}</h5>
                                                        <small class="designation text-muted">{{ $client['job_'.$lang] }}</small>
                                                    </div>
                                                </div><!--end reviewer-->
                                            </div><!--end client review-->
                                            <!--End Client-->
                                        @endforeach
                                    @endif
                                </div><!--end testi review-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div> <!-- end about detail -->
                </div> <!-- end col -->

                <div class="col-lg-4 offset-lg-8 padding-less img order-1" style="background-image:url('{{ $user->clients->image ? asset('uploads/'.$user->clients->image) : asset('assets/images/testi.jpg') }}')" data-jarallax='{"speed": 0.5}'></div><!-- end col -->
            </div><!--end row-->
        </div><!--end container fluid-->
    </section><!--end section-->
    <!-- Testimonial End -->

    <!-- Contact Start -->
    <section class="section pb-0" id="contact" style="{{ $user->contact && $user->contact->status ? '' : 'display: none' }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <div class="titles">
                            <h4 class="title title-line text-uppercase mb-4 pb-4">{{ $user->contact['title_'.$lang] }}</h4>
                            <span></span>
                        </div>
                        <p class="text-muted mx-auto para-desc mb-0">{{ $user->contact['desc_'.$lang] }}</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                @if ($user->contact->phone)
                    <div class="col-md-4 mt-4 pt-2">
                        <div class="contact-detail text-center">
                            <div class="icon">
                                <i data-feather="phone" class="fea icon-md"></i>
                            </div>
                            <div class="content mt-4">
                                <h5 class="title text-uppercase">{{ __('site.phone') }}</h5>
                                <p class="text-muted">{{ $user->contact['phone_desc_'.$lang] ? $user->contact['phone_desc_'.$lang] : '' }}</p>
                                <a href="tel:{{ $user->contact->phone }}" class="text-primary">{{ $user->contact->phone }}</a>
                            </div>
                        </div>
                    </div><!--end col-->
                @endif

                @if ($user->contact->email)
                    <div class="col-md-4 mt-4 pt-2">
                        <div class="contact-detail text-center">
                            <div class="icon">
                                <i data-feather="mail" class="fea icon-md"></i>
                            </div>
                            <div class="content mt-4">
                                <h5 class="title text-uppercase">{{ __('site.email') }}</h5>
                                <p class="text-muted">{{ $user->contact['email_desc_'.$lang] ? $user->contact['email_desc_'.$lang] : '' }}</p>
                                <a href="mailto:{{ $user->contact->email }}" class="text-primary">{{ $user->contact->email }}</a>
                            </div>
                        </div>
                    </div><!--end col-->
                @endif

                @if ($user->contact['address_'.$lang])
                    <div class="col-md-4 mt-4 pt-2">
                        <div class="contact-detail text-center">
                            <div class="icon">
                                <i data-feather="map-pin" class="fea icon-md"></i>
                            </div>
                            <div class="content mt-4">
                                <h5 class="title text-uppercase">{{ __('site.address') }}</h5>
                                <p class="text-muted">{{ $user->contact['address_'.$lang] }}</p>
                                @if ($user->contact->address_link)
                                    <a href="{{ $user->contact->address_link }}" class="video-play-icon text-primary">{{ __('site.view_on_map') }}</a>
                                @endif
                            </div>
                        </div>
                    </div><!--end col-->
                @endif
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->

    <section class="section pt-5 mt-3" style="{{ $user->contact && $user->contact->status ? '' : 'display: none' }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="custom-form mb-sm-30">
                        <form method="POST" action="{{ route('message.store',$user->id)}}">
                            @csrf
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    Your Message Has Been Sent Successfully
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6">
                                            <div class="form-group">
                                                <input name="full_name" id="name" type="text" value="{{ old('full_name') }}" class="form-control border rounded" placeholder="{{ __('site.full_name') }} :">
                                                <input type="hidden" name="username" value="{{$user->name}}">
                                                @error('full_name')
                                                    <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-12 col-md-6">
                                            <div class="form-group">
                                                <input name="email" id="email" type="email" value="{{ old('email') }}"  class="form-control border rounded" placeholder="{{ __('site.your_email') }} :">
                                                @error('email')
                                                    <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input name="subject" id="subject" type="text" value="{{ old('subject') }}" class="form-control border rounded" placeholder="{{ __('site.your_subject') }} :">
                                                @error('subject')
                                                    <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div><!--end col-->

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <textarea name="message" id="comments" rows="4" class="form-control border rounded" placeholder="{{ __('site.your_message') }} :">{{ old('message') }}</textarea>
                                        @error('message')
                                            <span class="invalid-feedback" style="display: inline-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button type="submit" class="btn btn-primary">{{ __('site.send_message') }}</button>
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
