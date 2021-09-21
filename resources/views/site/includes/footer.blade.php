    <!-- Footer Start -->
    <footer class="footer bg-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <a href="#"><img src="{{ $user->settings['light_logo_'.$lang] ? asset('uploads/'.$user->settings['light_logo_'.$lang]) : asset('assets/images/logo-light.png') }}" height="20" alt=""></a>
                    <p class="para-desc mx-auto mt-5">{{ $user->settings['footer_desc_'.$lang] }}</p>
                    <ul class="list-unstyled mb-0 mt-4 social-icon">
                        @if($user->settings->facebook)<li class="list-inline-item"><a href="{{ $user->settings->facebook }}" target="_blank"><i class="mdi mdi-facebook"></i></a></li>@endif
                        @if($user->settings->twiter)<li class="list-inline-item"><a href="{{ $user->settings->twiter }}" target="_blank"><i class="mdi mdi-twitter"></i></a></li>@endif
                        @if($user->settings->instagram)<li class="list-inline-item"><a href="{{ $user->settings->instagram }}" target="_blank"><i class="mdi mdi-instagram"></i></a></li>@endif
                        @if($user->settings->linkedin)<li class="list-inline-item"><a href="{{ $user->settings->linkedin }}" target="_blank"><i class="mdi mdi-linkedin"></i></a></li>@endif
                    </ul>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </footer><!--end footer-->
    <footer class="footer footer-bar bg-dark">
        <div class="container text-foot text-center">
            <p class="mb-0">© 2021 {{ $user->settings['website_name_'.$lang] }}</p>
        </div><!--end container-->
    </footer><!--end footer-->
    <!-- Footer End -->

    <!-- Back to top -->
    <a href="#" class="back-to-top rounded text-center" id="back-to-top">
        <i class="mdi mdi-chevron-up d-block"> </i>
    </a>
    <!-- Back to top -->
