<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ==== Document Title ==== -->
    <title>  بلدية خزاعة |@yield('title')</title>

    <!-- ==== Document Meta ==== -->
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- ==== Favicons ==== -->
    <link rel="icon" href="{{asset('favicon.png')}}" type="image/png">

    <!-- ==== Google Font ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700">

    <!-- ==== Font Awesome ==== -->
    <link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}">

    <!-- ==== Bootstrap Framework ==== -->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">

    <!-- ==== Bar Rating Plugin ==== -->
    <link rel="stylesheet" href="{{asset('front/css/fontawesome-stars-o.min.css')}}">

    <!-- ==== Main Stylesheet ==== -->
    <link rel="stylesheet" href="{{asset('style.css')}}">

    <!-- ==== Responsive Stylesheet ==== -->
    <link rel="stylesheet" href="{{asset('front/css/responsive-style.css')}}">

    <!-- ==== Theme Color Stylesheet ==== -->
    <link rel="stylesheet" href="{{asset('front/css/colors/theme-color-5.css')}}" id="changeColorScheme">

    <!-- ==== RTL Stylesheets ==== -->
    <link rel="stylesheet" href="{{asset('front/css/font-awesome-rtl.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/rtl-style.css')}}">

    <!-- ==== Custom Stylesheet ==== -->
    <link rel="stylesheet" href="{{asset('front/css/custom.css')}}">

    <!-- ==== HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries ==== -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

{{--<div id="gb-widget-9066" style="bottom: 21px;  opacity: 1; transition: opacity 0.5s ease 0s; box-sizing: border-box; position: fixed !important; z-index: 16000160 !important;">--}}
{{--        <div class="q8c6tt-2 jxPOhn">--}}
{{--            <a href="#" target="_blank" style="color:#4dc247;" id="" class="q8c6tt-0 jlzTty">--}}
{{--                <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="width: 30%; height: 30%; fill: #4DC247FF; stroke: none;">--}}
{{--                    <path d="M19.11 17.205c-.372 0-1.088 1.39-1.518 1.39a.63.63 0 0 1-.315-.1c-.802-.402-1.504-.817-2.163-1.447-.545-.516-1.146-1.29-1.46-1.963a.426.426 0 0 1-.073-.215c0-.33.99-.945.99-1.49 0-.143-.73-2.09-.832-2.335-.143-.372-.214-.487-.6-.487-.187 0-.36-.043-.53-.043-.302 0-.53.115-.746.315-.688.645-1.032 1.318-1.06 2.264v.114c-.015.99.472 1.977 1.017 2.78 1.23 1.82 2.506 3.41 4.554 4.34.616.287 2.035.888 2.722.888.817 0 2.15-.515 2.478-1.318.13-.33.244-.73.244-1.088 0-.058 0-.144-.03-.215-.1-.172-2.434-1.39-2.678-1.39zm-2.908 7.593c-1.747 0-3.48-.53-4.942-1.49L7.793 24.41l1.132-3.337a8.955 8.955 0 0 1-1.72-5.272c0-4.955 4.04-8.995 8.997-8.995S25.2 10.845 25.2 15.8c0 4.958-4.04 8.998-8.998 8.998zm0-19.798c-5.96 0-10.8 4.842-10.8 10.8 0 1.964.53 3.898 1.546 5.574L5 27.176l5.974-1.92a10.807 10.807 0 0 0 16.03-9.455c0-5.958-4.842-10.8-10.802-10.8z">--}}

{{--                    </path>--}}
{{--                </svg>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--</div>--}}


<body style="font-family: Cairo;background-color: #efefef">

<!-- Preloader Start -->
<div id="preloader">
    <div class="preloader bg--color-1--b" data-preloader="1">
        <div class="preloader--inner"></div>
    </div>
</div>
<!-- Preloader End -->

<!-- Wrapper Start -->
<div class="wrapper">
    <!-- Header Section Start -->
    <header class="header--section header--style-1">
        <!-- Header Topbar Start -->
{{--        <div class="header--topbar bg--color-2">--}}
{{--            <div class="container">--}}
{{--                <div class="float--left float--xs-none text-xs-center">--}}
{{--                    <!-- Header Topbar Info Start -->--}}
{{--                    <ul class="header--topbar-info nav">--}}
{{--                        <li><i class="fa fm fa-map-marker"></i>New York</li>--}}
{{--                        <li><i class="fa fm fa-mixcloud"></i>21<sup>0</sup> C</li>--}}
{{--                        <li><i class="fa fm fa-calendar"></i>Today (Sunday 19 April 2017)</li>--}}
{{--                    </ul>--}}
{{--                    <!-- Header Topbar Info End -->--}}
{{--                </div>--}}

{{--                <div class="float--right float--xs-none text-xs-center">--}}
{{--                    <!-- Header Topbar Action Start -->--}}
{{--                    <ul class="header--topbar-action nav">--}}
{{--                        <li><a href="login-rtl.html"><i class="fa fm fa-user-o"></i>Login/Register</a></li>--}}
{{--                    </ul>--}}
{{--                    <!-- Header Topbar Action End -->--}}

{{--                    <!-- Header Topbar Language Start -->--}}
{{--                    <ul class="header--topbar-lang nav">--}}
{{--                        <li class="dropdown">--}}
{{--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fm fa-language"></i>English<i class="fa flm fa-angle-down"></i></a>--}}

{{--                            <ul class="dropdown-menu">--}}
{{--                                <li><a href="#">English</a></li>--}}
{{--                                <li><a href="#">Spanish</a></li>--}}
{{--                                <li><a href="#">French</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <!-- Header Topbar Language End -->--}}

{{--                    <!-- Header Topbar Social Start -->--}}
{{--                    <ul class="header--topbar-social nav hidden-sm hidden-xxs">--}}
{{--                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
{{--                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>--}}
{{--                        <li><a href="#"><i class="fa fa-rss"></i></a></li>--}}
{{--                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>--}}
{{--                    </ul>--}}
{{--                    <!-- Header Topbar Social End -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- Header Topbar End -->

        <!-- Header Mainbar Start -->
        <div class="header--mainbar">
            <div class="container">
                <!-- Header Logo Start -->
                <div class="header--logo float--left float--sm-none text-sm-center">
                    <h1 class="h1">
                        <a href="home-1-rtl.html" class="btn-link">
                            <img src="{{asset('front/img/23.png')}}" alt="USNews Logo">
                            <span class="hidden">بلدية خزاعة</span>
                        </a>
                    </h1>
                </div>
                <!-- Header Logo End -->

                <!-- Header Ad Start -->
                <div class="header--ad float--right float--sm-none hidden-xs">
                    <a href="#">
                        <img src="{{asset('front/img/ads-img/ad-728x90-01.jpg')}}" alt="Advertisement">
                    </a>
                </div>
                <!-- Header Ad End -->
            </div>
        </div>
        <!-- Header Mainbar End -->

        <!-- Header Navbar Start -->
        <div class="header--navbar navbar bd--color-1 bg--color-1" data-trigger="sticky">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headerNav" aria-expanded="false" aria-controls="headerNav">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div id="headerNav" class="navbar-collapse collapse float--left">
                    <!-- Header Menu Links Start -->
                    <ul class="header--menu-links nav navbar-nav" data-trigger="hoverIntent">
                        <li class="menu">
                            <a href="{{route('home')}}" class="menu" >الرئيسية</a>
                        </li>
                        <li><a href="{{route('media')}}">الإعلام</a></li>
                        <li><a href="{{route('media')}}">اخر الأخبار</a></li>
                        <li><a href="{{route('media')}}">بلدة خزاعة</a></li>
                        <li><a href="{{route('media')}}">الإعلام</a></li>
                    </ul>
                    <!-- Header Menu Links End -->
                </div>

                <!-- Header Search Form Start -->
                <form action="#" class="header--search-form float--right" data-form="validate">
                    <input type="search" name="search" placeholder="بحث ..." class="header--search-control form-control" required>

                    <button type="submit" class="header--search-btn btn"><i class="header--search-icon fa fa-search"></i></button>
                </form>
                <!-- Header Search Form End -->
            </div>
        </div>
        <!-- Header Navbar End -->
    </header>
    <!-- Header Section End -->

    <!-- Posts Filter Bar Start -->

    <!-- Posts Filter Bar End -->

@yield('content')


<!-- Footer Section Start -->
    <footer class="footer--section">
        <!-- Footer Widgets Start -->
        <div class="footer--widgets pd--30-0 bg--color-2">
            <div class="container">
                <div class="row AdjustRow">
                    <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                        <!-- Widget Start -->
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">عن البلدية</h2>

                                <i class="icon fa fa-exclamation"></i>
                            </div>

                            <!-- About Widget Start -->
                            <div class="about--widget">
                                <div class="content">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium laborum et dolorum fuga.</p>
                                </div>

                                <div class="action">
                                    <a href="#" class="btn-link">Read More<i class="fa flm fa-angle-double-right"></i></a>
                                </div>

                                <ul class="nav">
                                    <li>
                                        <i class="fa fa-map"></i>
                                        <span>143/C, Fake Street, Melborne, Australia</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope-o"></i>
                                        <a href="mailto:example@example.com">example@example.com</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-phone"></i>
                                        <a href="tel:+123456789">+123 456 (789)</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- About Widget End -->
                        </div>
                        <!-- Widget End -->
                    </div>

                    <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                        <!-- Widget Start -->
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">روابط مهمة</h2>

                                <i class="icon fa fa-expand"></i>
                            </div>

                            <!-- Links Widget Start -->
                            <div class="links--widget">
                                <ul class="nav">
                                    <li><a href="#" class="fa-angle-right">Gadgets</a></li>
                                    <li><a href="#" class="fa-angle-right">Shop</a></li>
                                    <li><a href="#" class="fa-angle-right">Term and Conditions</a></li>
                                    <li><a href="#" class="fa-angle-right">Forums</a></li>
                                    <li><a href="#" class="fa-angle-right">Top News of This Week</a></li>
                                    <li><a href="#" class="fa-angle-right">Special Recipes</a></li>
                                    <li><a href="#" class="fa-angle-right">Sign Up</a></li>
                                </ul>
                            </div>
                            <!-- Links Widget End -->
                        </div>
                        <!-- Widget End -->
                    </div>

                    <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                        <!-- Widget Start -->
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">الإعلانات</h2>

                                <i class="icon fa fa-bullhorn"></i>
                            </div>

                            <!-- Links Widget Start -->
                            <div class="links--widget">
                                <ul class="nav">
                                    <li><a href="#" class="fa-angle-right">Post an Add</a></li>
                                    <li><a href="#" class="fa-angle-right">Adds Renew</a></li>
                                    <li><a href="#" class="fa-angle-right">Price of Advertisements</a></li>
                                    <li><a href="#" class="fa-angle-right">Adds Closed</a></li>
                                    <li><a href="#" class="fa-angle-right">Monthly or Yearly</a></li>
                                    <li><a href="#" class="fa-angle-right">Trial Adds</a></li>
                                    <li><a href="#" class="fa-angle-right">Add Making</a></li>
                                </ul>
                            </div>
                            <!-- Links Widget End -->
                        </div>
                        <!-- Widget End -->
                    </div>

                    <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                        <!-- Widget Start -->
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">الوظائف</h2>

                                <i class="icon fa fa-user-o"></i>
                            </div>

                            <!-- Links Widget Start -->
                            <div class="links--widget">
                                <ul class="nav">
                                    <li><a href="#" class="fa-angle-right">Available Post</a></li>
                                    <li><a href="#" class="fa-angle-right">Career Details</a></li>
                                    <li><a href="#" class="fa-angle-right">How to Apply?</a></li>
                                    <li><a href="#" class="fa-angle-right">Freelence Job</a></li>
                                    <li><a href="#" class="fa-angle-right">Be a Member</a></li>
                                    <li><a href="#" class="fa-angle-right">Apply Now</a></li>
                                    <li><a href="#" class="fa-angle-right">Send Your Resume</a></li>
                                </ul>
                            </div>
                            <!-- Links Widget End -->
                        </div>
                        <!-- Widget End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Widgets End -->

        <!-- Footer Copyright Start -->
        <div class="footer--copyright bg--color-3">
            <div class="social--bg bg--color-1"></div>

            <div class="container">
                <p class="text float--left">&copy; 2017 <a href="#">USNEWS</a>. All Rights Reserved.</p>

                <ul class="nav social float--right">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                </ul>

                <ul class="nav links float--right">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Support</a></li>
                </ul>
            </div>
        </div>
        <!-- Footer Copyright End -->
    </footer>
    <!-- Footer Section End -->
</div>
<!-- Wrapper End -->

<!-- Sticky Social Start -->
<div id="stickySocial" class="sticky--left">
    <ul class="nav">
        <li>
            <a href="#">
                <i class="fa fa-facebook"></i>
                <span>تابعنا على فيس بوك</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-twitter"></i>
                <span>تابعنا على تويتر</span>
            </a>
        </li>

    </ul>
</div>
<!-- Sticky Social End -->

<!-- Back To Top Button Start -->
<div id="backToTop">
    <a href="#"><i class="fa fa-angle-double-up"></i></a>
</div>
<!-- Back To Top Button End -->

<!-- ==== jQuery Library ==== -->
<script src="{{asset('front/js/jquery-3.2.1.min.js')}}"></script>

<!-- ==== Bootstrap Framework ==== -->
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>

<!-- ==== StickyJS Plugin ==== -->
<script src="{{asset('front/js/jquery.sticky.min.js')}}"></script>

<!-- ==== HoverIntent Plugin ==== -->
<script src="{{asset('front/js/jquery.hoverIntent.min.js')}}"></script>

<!-- ==== Marquee Plugin ==== -->
<script src="{{asset('front/js/jquery.marquee.min.js')}}"></script>

<!-- ==== Validation Plugin ==== -->
<script src="{{asset('front/js/jquery.validate.min.js')}}"></script>

<!-- ==== Isotope Plugin ==== -->
<script src="{{asset('front/js/isotope.min.js')}}"></script>

<!-- ==== Resize Sensor Plugin ==== -->
<script src="{{asset('front/js/resizesensor.min.js')}}"></script>

<!-- ==== Sticky Sidebar Plugin ==== -->
<script src="{{asset('front/js/theia-sticky-sidebar.min.js')}}"></script>

<!-- ==== Zoom Plugin ==== -->
<script src="{{asset('front/js/jquery.zoom.min.js')}}"></script>

<!-- ==== Bar Rating Plugin ==== -->
<script src="{{asset('front/js/jquery.barrating.min.js')}}"></script>

<!-- ==== Countdown Plugin ==== -->
<script src="{{asset('front/js/jquery.countdown.min.js')}}"></script>

<!-- ==== RetinaJS Plugin ==== -->
<script src="{{asset('front/js/retina.min.js')}}"></script>
<link href="{{asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>


<!-- ==== Google Map API ==== -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK9f7sXWmqQ1E-ufRXV3VpXOn_ifKsDuc"></script>

<!-- ==== Main JavaScript ==== -->
<script src="{{asset('front/js/main.js')}}"></script>

@yield('scripts')

</body>
</html>
