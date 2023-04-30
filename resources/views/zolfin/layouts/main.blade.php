<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ !isset($title) ? config('app.name') : $title .' | '. config('app.name') }}</title>

    <!-- favicon -->
    <link rel="icon" href="{{ asset('public/favicon.ico') }}" sizes="16x16" type="image/ico"/>

    <!-- Stylesheet Link -->
    <link rel="stylesheet" href="{{ asset('public/zolfin/assets/css/style.css') }}" />
</head>
<body class="t-bg-light-2">
<!-- Preloader -->
{{--<div class="content preloader">--}}
{{--    <div id="inTurnFadingTextG">--}}
{{--        <div id="inTurnFadingTextG_1" class="inTurnFadingTextG">Z</div>--}}
{{--        <div id="inTurnFadingTextG_2" class="inTurnFadingTextG">O</div>--}}
{{--        <div id="inTurnFadingTextG_3" class="inTurnFadingTextG">L</div>--}}
{{--        <div id="inTurnFadingTextG_4" class="inTurnFadingTextG">F</div>--}}
{{--        <div id="inTurnFadingTextG_5" class="inTurnFadingTextG">I</div>--}}
{{--        <div id="inTurnFadingTextG_6" class="inTurnFadingTextG">N</div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- Preloader -->

<!-- Header  -->
@include('zolfin.inc.header')
<!-- Header End -->

{{ $slot }}

<!-- Back To Top -->
<div class="back-to-top">
    <span class="back-top">
        <i class="las la-angle-up"></i>
    </span>
</div>
<!-- Back To Top End -->

<!-- Footer  -->
@if(!request()->routeIs('home'))
    <footer class="l-footer t-pt-50 pt-lg-0">
        <div class="footer-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 t-mb-30 mb-lg-0">
                        <div class="brand mx-auto mx-lg-0">
                            <a href="{{ route('home') }}" class="t-link">
                                <img src="{{ asset('public/zolfin/assets/img/logo.png') }}" alt="zolfin" class="img-fluid w-100"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="cta t-bg-primary t-pt-50 t-pb-50 text-center d-lg-flex align-items-lg-center justify-content-lg-around">
                            <h3 class="text-capitalize t-text-light text-center mt-lg-0 mb-lg-0">
                                Ready to Work Together?
                            </h3>
                            <a href="contact.html" class="t-link bttn bttn-lg bttn-round bttn-light text-capitalize">
                                get started
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-mid t-mt-50">
            <div class="container">
                <div class="border-bottom t-pb-50">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 t-mb-30 mb-lg-0">
                            <h5 class="mt-0 text-capitalize text-center text-md-left">
                                Our Service
                            </h5>
                            <ul class="t-list text-center text-md-left">
                                <li class="t-mb-10">
                                    <a href="service-details.html" class="t-link text-capitalize t-link--primary t-link--alpha">
                                        Web Page Design
                                    </a>
                                </li>
                                <li class="t-mb-10">
                                    <a href="service-details.html" class="t-link text-capitalize t-link--primary t-link--alpha">
                                        iOS Application
                                    </a>
                                </li>
                                <li class="t-mb-10">
                                    <a href="service-details.html" class="t-link text-capitalize t-link--alpha">
                                        UX Research
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-3 t-mb-30 mb-lg-0">
                            <h5 class="mt-0 text-capitalize text-center text-md-left">More link</h5>
                            <ul class="t-list text-center text-md-left">
                                <li class="t-mb-10">
                                    <a href="blog.html" class="t-link text-capitalize t-link--primary t-link--alpha">
                                        blog
                                    </a>
                                </li>
                                <li class="t-mb-10">
                                    <a href="process.html" class="t-link text-capitalize t-link--primary t-link--alpha">
                                        terms condition
                                    </a>
                                </li>
                                <li class="t-mb-10">
                                    <a href="about.html" class="t-link text-capitalize t-link--alpha">
                                        legal info
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-2 t-mb-30 mb-lg-0">
                            <h5 class="mt-0 text-capitalize text-center text-md-left">contact</h5>
                            <ul class="t-list text-center text-md-left">
                                <li class="t-mb-10">
                                    <a href="contact.html" class="t-link text-capitalize t-link--primary t-link--alpha">
                                        online form
                                    </a>
                                </li>
                                <li class="t-mb-10">
                                    <a href="contact.html" class="t-link text-capitalize t-link--primary t-link--alpha">
                                        support
                                    </a>
                                </li>
                                <li class="t-mb-10">
                                    <a href="contact.html" class="t-link text-capitalize t-link--alpha">
                                        contact us
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-4 t-mb-30 mb-lg-0 text-center text-md-left">
                                <span class="text-uppercase t-text-alpha lg-text font-weight-bold d-block">
                                    newsletter
                                </span>
                            <h4 class="text-capitalize t-mt-10">
                                Subscribe to the free newsletter
                            </h4>
                            <form action="#" class="newsletter border t-pt-5 t-pb-5 t-pl-15 t-pr-10">
                                <input type="text" placeholder="your email" class="w-100 newsletter__input"/>
                                <button class="newsletter__button bttn bttn-round bttn-alpha bttn-sm text-uppercase border-0">
                                    join now
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom t-pt-15 t-pb-15">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 t-mb-15 mb-md-0 text-center text-md-left">
                        &copy; {{ date('Y') }},
                        <a href="#" class="t-link t-link--alpha">Zolfin</a>.
                        All Rights Reserved.
                    </div>
                    <div class="col-md-6">
                        <ul class="t-list social-list justify-content-center justify-content-md-end">
                            <li class="social-list__item">
                                <a href="#" class="t-link social-icon social-icon--alpha">
                                <span class="xlg-text">
                                    <i class="lab la-facebook-f"></i>
                                </span>
                                </a>
                            </li>
                            <li class="social-list__item">
                                <a href="#" class="t-link social-icon social-icon--alpha">
                                <span class="xlg-text">
                                    <i class="lab la-twitter"></i>
                                </span>
                                </a>
                            </li>
                            <li class="social-list__item">
                                <a href="#" class="t-link social-icon social-icon--alpha">
                                <span class="xlg-text">
                                    <i class="lab la-instagram"></i>
                                </span>
                                </a>
                            </li>
                            <li class="social-list__item">
                                <a href="#" class="t-link social-icon social-icon--alpha">
                                <span class="xlg-text">
                                    <i class="lab la-linkedin-in"></i>
                                </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endif
<!-- Footer End -->

<!-- jquery -->
<script src="{{ asset('public/zolfin/assets/js/jquery.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('public/zolfin/assets/js/bootstrap.bundle.min.js') }}"></script>
<!-- Slick Slider  -->
<script src="{{ asset('public/zolfin/assets/js/slick.min.js') }}"></script>
<!-- Nice Select  -->
<script src="{{ asset('public/zolfin/assets/js/jquery.nice-select.min.js') }}"></script>
<!-- Owl carousel -->
<script src="{{ asset('public/zolfin/assets/js/owl.carousel.min.js') }}"></script>
<!-- Popup  -->
<script src="{{ asset('public/zolfin/assets/js/magnafic-popup.js') }}"></script>
<!-- Animation on Scroll  -->
<script src="{{ asset('public/zolfin/assets/js/sal.js') }}"></script>
<!-- Main script -->
<script src="{{ asset('public/zolfin/assets/js/main.js') }}"></script>
</body>
</html>

