@extends('blog.app')

@section('title')
    {{'الرئيسية'}}
@endsection

<style>
    * {box-sizing: border-box;}
    body {font-family: Verdana, sans-serif;}
    .mySlides {display: none;}
    img {vertical-align: middle;}

    /* Slideshow container */
    .slideshow-container {
        max-width: 90%;
        position: relative;
        margin: auto;
    }

    /* Caption text */
    /*.text {*/
    /*    color: #f2f2f2;*/
    /*    font-size: 15px;*/
    /*    padding: 8px 12px;*/
    /*    position: absolute;*/
    /*    bottom: 8px;*/
    /*    width: 100%;*/
    /*    text-align: center;*/
    /*}*/

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

    @keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
        .text {font-size: 11px}
    }
</style>

@section('content')


    <div class="modal fade " id="take" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                    </button>
                    <p align="center" id="description">

                    </p>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="complaint" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h4 class="modal-title">تقديم شكوى</h4>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                </div>

                <form action="{{route('complaints.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">اسم المواطن</label>
                            <input type="text" class="form-control" id="name" name="name" required="">
                        </div>

                        <div class="form-group">
                            <label for="phone">رقم الجوال</label>
                            <input type="text" class="form-control" id="phone" name="phone" required="">
                        </div>


                        <div class="form-group">
                            <label for="description">الشكوى</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn ripple btn-success" type="submit">إرسال</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    @if (session()->has('complaint_added'))

        <script>
            window.onload = function () {
                notif({
                    msg: "تم إرسال الشكوى بنجاح",
                    type: "success"
                });
            }
        </script>

    @endif
    <div class="news--ticker">
    <div class="container">
        <div class="title">
            <h2>اخر الأخبار</h2>
{{--            <span>(Update 12 minutes ago)</span>--}}
        </div>


        <div class="news-updates--list" data-marquee="true">
            <ul class="nav">
                @foreach($allPosts as $post)
                <li>
                    <h3 class="h3"><a href="{{route('posts.show',$post->id)}}">{{$post->title}}</a></h3><i class="fa-arrow-circle-o-right"></i>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!-- News Ticker End -->


    <body>

{{--    <h2>Automatic Slideshow</h2>--}}
{{--    <p>Change image every 2 seconds:</p>p--}}
<br><br>

    <div class="slideshow-container">

        @foreach($posts as $post)

        <div class="mySlides fade">
            <div class="numbertext"></div>
            <img src="{{asset('postsImages/'.$post->image)}}" style="width:100%">
            <div class="text" style="color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;">{{$post->title}}</div>
        </div>

        @endforeach
    </div>
    <br>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>

    </body>

<!-- Main Content Section Start -->
<div class="main-content--section pbottom--30">
    <div class="container">
        <!-- Main Content Start -->

        <div class="main--content">
            <!-- Post Items Start -->
            <div class="post--items post--items-1 pd--30-0">
                <div class="row gutter--15">
                    <div class="col-md-6">
                        <!-- Post Item Start -->
                        <div class="post--item post--layout-1 post--title-larger">
                            @foreach($posts as $key => $post)

                            @if ($key == 0)
                                    <div class="post--img">
                                        <a href="news-single-v1-rtl.html" class="thumb"><img src="{{asset('postsImages/'.$post->image)}}" alt=""></a>
                                        <a href="#" class="cat">{{$post->category->name}}</a>

                                        <div class="post--map">
{{--                                            <p class="btn-link"><i class="fa fa-map-o"></i>Location in Google Map</p>--}}

                                            <div class="map--wrapper">
                                                <div data-map-latitude="23.790546" data-map-longitude="90.375583" data-map-zoom="6" data-map-marker="[[23.790546, 90.375583]]"></div>
                                            </div>
                                        </div>

                                        <div class="post--info">
                                            <ul class="nav meta">
{{--                                                <li><a href="#">Norma R. Hogan</a></li>--}}
                                                <li><span>{{$post->created_at->diffForHumans()}}</span></li>
                                            </ul>

                                            <div class="title">
                                                <h2 class="h4"><a href="news-single-v1-rtl.html" class="btn-link">{{ Str::limit($post->title ,50)}}</a></h2>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <!-- Post Item End -->
                    </div>

                    <div class="col-md-6">
                        <div class="row gutter--15">
                            <div class="col-xs-6 col-xss-12">
                                <!-- Post Item Start -->
                                <div class="post--item post--layout-1 post--title-large">
                                    @foreach($posts as $key => $post)

                                        @if ($key == 1)
                                            <div class="post--img">
                                                <a href="news-single-v1-rtl.html" class="thumb"><img src="{{asset('postsImages/'.$post->image)}}" alt=""></a>
                                                <a href="#" class="cat">{{$post->category->name}}</a>

                                                <div class="post--map">
                                                    {{--                                            <p class="btn-link"><i class="fa fa-map-o"></i>Location in Google Map</p>--}}

                                                    <div class="map--wrapper">
                                                        <div data-map-latitude="23.790546" data-map-longitude="90.375583" data-map-zoom="6" data-map-marker="[[23.790546, 90.375583]]"></div>
                                                    </div>
                                                </div>

                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        {{--                                                <li><a href="#">Norma R. Hogan</a></li>--}}
                                                        <li><span>{{$post->created_at->diffForHumans()}}</span></li>
                                                    </ul>

                                                    <div class="title">
                                                        <h2 class="h4"><a href="news-single-v1-rtl.html" class="btn-link">{{ Str::limit($post->title ,50)}}</a></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                                <div class="post--item post--layout-1 post--title-large">
                                    @foreach($posts as $key => $post)

                                        @if ($key == 2)
                                            <div class="post--img">
                                                <a href="news-single-v1-rtl.html" class="thumb"><img src="{{asset('postsImages/'.$post->image)}}" alt=""></a>
                                                <a href="#" class="cat">{{$post->category->name}}</a>

                                                <div class="post--map">
                                                    {{--                                            <p class="btn-link"><i class="fa fa-map-o"></i>Location in Google Map</p>--}}

                                                    <div class="map--wrapper">
                                                        <div data-map-latitude="23.790546" data-map-longitude="90.375583" data-map-zoom="6" data-map-marker="[[23.790546, 90.375583]]"></div>
                                                    </div>
                                                </div>

                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        {{--                                                <li><a href="#">Norma R. Hogan</a></li>--}}
                                                        <li><span>{{$post->created_at->diffForHumans()}}</span></li>                                                    </ul>

                                                    <div class="title">
                                                        <h2 class="h4"><a href="#" class="btn-link">{{ Str::limit($post->title ,50)}}</a></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                                <!-- Post Item End -->
                            </div>

                            <div class="col-xs-6 hidden-xss">
                                <!-- Post Item Start -->
                                <div class="post--item post--layout-1 post--title-large">
                                    @foreach($posts as $key => $post)

                                        @if ($key == 3)
                                            <div class="post--img">
                                                <a href="news-single-v1-rtl.html" class="w150 h150 rounded"><img src="{{asset('postsImages/'.$post->image)}}" alt=""></a>
                                                <a href="#" class="cat">{{$post->category->name}}</a>

                                                <div class="post--map">
                                                    {{--                                            <p class="btn-link"><i class="fa fa-map-o"></i>Location in Google Map</p>--}}

                                                    <div class="map--wrapper">
                                                        <div data-map-latitude="23.790546" data-map-longitude="90.375583" data-map-zoom="6" data-map-marker="[[23.790546, 90.375583]]"></div>
                                                    </div>
                                                </div>

                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        {{--                                                <li><a href="#">Norma R. Hogan</a></li>--}}
                                                        <li><span>{{$post->created_at->diffForHumans()}}</span></li>                                                    </ul>

                                                    <div class="title">
                                                        <h2 class="h4"><a href="news-single-v1-rtl.html" class="btn-link">{{ Str::limit($post->title ,50)}}</a></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="post--item post--layout-1 post--title-large">
                                    @foreach($posts as $key => $post)

                                        @if ($key == 4)
                                            <div class="post--img">
                                                <a href="news-single-v1-rtl.html" class="w150 h150 rounded"><img src="{{asset('postsImages/'.$post->image)}}" alt=""></a>
                                                <a href="#" class="cat">{{$post->category->name}}</a>

                                                <div class="post--map">
                                                    {{--                                            <p class="btn-link"><i class="fa fa-map-o"></i>Location in Google Map</p>--}}

                                                    <div class="map--wrapper">
                                                        <div data-map-latitude="23.790546" data-map-longitude="90.375583" data-map-zoom="6" data-map-marker="[[23.790546, 90.375583]]"></div>
                                                    </div>
                                                </div>

                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        {{--                                                <li><a href="#">Norma R. Hogan</a></li>--}}
                                                        <li><span>{{$post->created_at->diffForHumans()}}</span></li>                                                    </ul>

                                                    <div class="title">
                                                        <h2 class="h4"><a href="news-single-v1-rtl.html" class="btn-link">{{ Str::limit($post->title ,50)}}</a></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- Post Item End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Post Items End -->
        </div>
        <!-- Main Content End -->

                    {{--        مشاريع البلدية--}}
        <div class="main-content--section pbottom--30">
            <div class="container">
                <!-- Main Content Start -->
                <div class="main--content">
                    <div class="row">
                        <div class="post--items-title" data-ajax="tab"  >
                        <div class="col-md-8 col-md-offset-2">
                            <!-- Page Title Start -->
                            <div class="page--title pd--30-0 text-center">
                                <h2 class="h2">مشاريع البلدية</h2>

{{--                                <div class="content">--}}
{{--                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--                                </div>--}}


                            </div>
                            <!-- Page Title End -->
                        </div>
                        </div>
                    </div>

                    <!-- Contributor Items Start -->
                    <div class="contributor--items ptop--30">
                        <ul class="nav row AdjustRow" style="position: relative; height: 302.337px;">
                            @foreach($projects as $project)
                            <li class="col-md-3 col-xs-6 col-xxs-12 pbottom--30" style="position: absolute; left: 0px; top: 0px;">
                                <!-- Contributor Item Start -->
                                <div class="contributor--item style--4">
                                    <div class="img" >
                                        <img style="width: 300px;height: 300px" src="{{asset('projects_images/'.$project->image)}}" alt="" data-rjs="2" data-rjs-processed="true">
                                    </div>

                                    <div class="info">
                                        <div class="vc--parent">
                                            <div class="vc--child">
                                                <div class="name">
                                                    <h3 class="h4">{{ Str::limit($project->title ,20)}}</h3>
                                                </div>

                                                <div class="desc">
                                                    <p>{{Str::limit($project->description , 80)}}</p>
                                                </div>


                                                <div class="action">
                                                    <a href="{{route('projects.show',$project->id)}}" class="btn btn-default">تفاصيل المشروع</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Contributor Item End -->
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Contributor Items End -->
                </div>
                <!-- Main Content End -->
            </div>

        </div>
        <div class="action text-center">
            <a href="#" class="btn btn-primary btn-lg" style="border-radius: 50px">عرض الكل</a>
        </div>


                    {{--                دليل المعملات--}}
            <div style="background-color: #efefef" class="col-md-12 ptop--30 pbottom--30">
                <!-- Post Items Title Start -->
                <div class="post--items-title" data-ajax="tab"  style="text-align: center">
                    <h2 style="color: #eea236"><strong>دليل المعاملات</strong></h2>

                </div>
                <!-- Post Items Title End -->

                <!-- Post Items Start -->
                <div class="post--items" data-ajax-content="outer">
                    <ul class="nav row gutter--15" data-ajax-content="inner" >
                        @foreach($transactions as $transaction)
                        <li  class="col-sm-2  ">
                            <!-- Post Item Start -->
                            <div class="post--item post--layout-1"  >
                                <div class="post--img" >
                                    <a href="#take" data-effect="effect-scale"
                                       data-id="{{ $transaction->id }}" data-description="{{ $transaction->description }}"
                                       data-toggle="modal" class="thumb" ><img style="width: 390px;height: 200px" src="{{asset('transactions_images/'.$transaction->image)}}" alt="" data-rjs="2" data-rjs-processed="true"></a>

                                    <div class="post--info" >

                                        <div  class="title" >
                                            <h3><a href="#take" data-effect="effect-scale"
                                                   data-id="{{ $transaction->id }}" data-description="{{ $transaction->description }}"
                                                   data-toggle="modal" class="btn btn-warning" style="border-radius: 50px">{{$transaction->title}}</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Post Item End -->
                        </li>
                        @endforeach
                    </ul>

                    <!-- Preloader Start -->
                    <div class="preloader bg--color-0--b" data-preloader="1">
                        <div class="preloader--inner"></div>
                    </div>
                    <!-- Preloader End -->
                </div>
                <!-- Post Items End -->
            </div>


<br>
<br>
<br>
                            {{--                دليل الشكاوي--}}
        <div style="background-color: #efefef" class="col-md-12 ptop--30 pbottom--30">
            <!-- Post Items Title Start -->
            <div class="post--items-title" data-ajax="tab"  style="text-align: center">
                <h2  style="color: #eea236"><strong> شكاوي الجمهور</strong></h2>
                <h4  style="color: rgba(٥٣,٨٨,٥٢,0.45)">نقدم لكم في بلدية خزاعة العديد من الخدمات ومن أبرزها</h4>

            </div>
            <!-- Post Items Title End -->

            <!-- Post Items Start -->
            <div class="post--items" data-ajax-content="outer">
                <ul class="nav row gutter--15" data-ajax-content="inner">
                    <li class="col-sm-2  ">
                        <!-- Post Item Start -->

                            <div class="post--img">
                                        <h3 style="color: white"><a href="#complaint" data-toggle="modal" class="btn btn-warning btn-lg" style="border-radius: 20px;">دليل المعاملات</a></h3>
                            </div>

                        <!-- Post Item End -->
                    </li>
                </ul>

                <!-- Preloader Start -->
                <div class="preloader bg--color-0--b" data-preloader="1">
                    <div class="preloader--inner"></div>
                </div>
                <!-- Preloader End -->
            </div>
            <!-- Post Items End -->
        </div>








        <div class="row">
            <!-- Main Content Start -->
            <div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <div class="row">

                        <!-- Photo Gallery End -->
                    </div>
                </div>
            </div>
            <!-- Main Content End -->


            <!-- Main Sidebar End -->
        </div>
    </div>
</div>
<!-- Main Content Section End -->

@endsection
@section('scripts')
    <script>
        $('#take').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            // modal.find('.modal-body #description').val(description);
            document.getElementById('description').innerHTML = description;
        })
    </script>
    <script src="{{asset('assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
