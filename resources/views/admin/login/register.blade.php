<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from weblearnbd.net/tphtml/shofy-prv/shofy/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Jul 2023 09:25:28 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shofy - Multipurpose eCommerce HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('client/assets/img/logo/favicon.png')}}">


    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('client/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/swiper-bundle.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/font-awesome-pro.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/flaticon_shofy.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/spacing.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/main.css')}}">
</head>
<body>
@include('templates.error')
<main>
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg text-center pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Register Now</h3>
                        <div class="breadcrumb__list">
                            <span><a href="#">Home</a></span>
                            <span>Register</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- login area start -->
    <section class="tp-login-area pb-140 p-relative z-index-1 fix">
        <div class="tp-login-shape">
            <img class="tp-login-shape-1" src="{{asset('client/assets/img/login/login-shape-1.png')}}" alt="">
            <img class="tp-login-shape-2" src="{{asset('client/assets/img/login/login-shape-2.png')}}" alt="">
            <img class="tp-login-shape-3" src="{{asset('client/assets/img/login/login-shape-3.png')}}" alt="">
            <img class="tp-login-shape-4" src="{{asset('client/assets/img/login/login-shape-4.png')}}" alt="">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="tp-login-wrapper">
                        <div class="tp-login-top text-center mb-30">
                            <h3 class="tp-login-title">Sign Up.</h3>
                            <p>Already have an account?  <span><a href="{{route('route_admin_login')}}">Sign In</a></span></p>
                        </div>
                        <form method="POST" action="{{route('route_admin_register')}}">
                            @csrf
                            <div class="tp-login-option">
                            <div class="tp-login-input-wrapper">
                                <div class="tp-login-input-box">
                                    <div class="tp-login-input">
                                        <input name="name" id="name" type="text" placeholder="Shahnewaz Sakil">
                                    </div>
                                    <div class="tp-login-input-title">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="tp-login-input-box">
                                    <div class="tp-login-input">
                                        <input name="email" id="email" type="email" placeholder="shofy@mail.com">
                                    </div>
                                    <div class="tp-login-input-title">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="tp-login-input-box">
                                    <div class="tp-login-input">
                                        <input name="password" id="tp_password" type="password" placeholder="Min. 6 character">
                                    </div>
                                    <div class="tp-login-input-title">
                                        <label for="tp_password">Password</label>
                                    </div>
                                </div>

                                <div class="tp-login-input-box">
                                    <div class="tp-login-input">
                                        <input name="confirm_password" id="tp_password" type="password" placeholder="Min. 6 character">
                                    </div>
                                    <div class="tp-login-input-title">
                                        <label for="tp_password">Confirm Password</label>
                                    </div>
                                </div>

                            </div>
                            <div class="tp-login-suggetions d-sm-flex align-items-center justify-content-between mb-20">
                                <div class="tp-login-remeber">
                                    <input id="remeber" type="checkbox">
                                    <label for="remeber">I accept the terms of the Service & <a href="#">Privacy Policy</a>.</label>
                                </div>
                            </div>
                            <div class="tp-login-bottom">
                                <button type="submit" class="tp-login-btn w-100">Sign Up</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login area end -->

</main>



<!-- JS here -->
<script src="{{asset('client/assets/js/vendor/jquery.js')}}"></script>
<script src="{{asset('client/assets/js/vendor/waypoints.js')}}"></script>
<script src="{{asset('client/assets/js/bootstrap-bundle.js')}}"></script>
<script src="{{asset('client/assets/js/meanmenu.js')}}"></script>
<script src="{{asset('client/assets/js/swiper-bundle.js')}}"></script>
<script src="{{asset('client/assets/js/slick.js')}}"></script>
<script src="{{asset('client/assets/js/range-slider.js')}}"></script>
<script src="{{asset('client/assets/js/magnific-popup.js')}}"></script>
<script src="{{asset('client/assets/js/nice-select.js')}}"></script>
<script src="{{asset('client/assets/js/purecounter.js')}}"></script>
<script src="{{asset('client/assets/js/countdown.js')}}"></script>
<script src="{{asset('client/assets/js/wow.js')}}"></script>
<script src="{{asset('client/assets/js/isotope-pkgd.js')}}"></script>
<script src="{{asset('client/assets/js/imagesloaded-pkgd.js')}}"></script>
<script src="{{asset('client/assets/js/ajax-form.js')}}"></script>
<script src="{{asset('client/assets/js/main.js')}}"></script>
</body>

<!-- Mirrored from weblearnbd.net/tphtml/shofy-prv/shofy/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Jul 2023 09:25:28 GMT -->
</html>
