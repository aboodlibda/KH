@extends('blog.app')


@section('content')


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
                            <h3 class="h3"><a href="#">{{$post->title}}</a></h3><i class="fa-arrow-circle-o-right"></i>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="main-content--section pbottom--30">
        <div class="container">
            <div class="row" style="transform: none;">
                <!-- Main Content Start -->
                <div class="main--content col-md-8" data-sticky-content="true" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 4066.4px;">
                    <div class="sticky-content-inner" style="padding-top: 0px; padding-bottom: 1px; position: absolute; transform: translateY(413.95px); width: 750px; top: 0px;">
                        <!-- Post Item Start -->
                        <div class="post--item post--single post--title-largest pd--30-0">
                            <div class="post--info">
                                <ul class="nav meta">
{{--                                    <li><a href="#">Norma R. Hogan</a></li>--}}
                                    <li><span>{{$project->created_at->diffForHumans()}}</span></li>
{{--                                    <li><span><i class="fa fm fa-eye"></i>45k</span></li>--}}
{{--                                    <li><span><i class="fa fm fa-comments-o"></i>02</span></li>--}}
                                </ul>

                                <div class="title">
                                    <h2 class="h4">{{$project->title}}</h2>
                                </div>
                            </div>

                            <div class="post--img">
                                <a href="#" class="thumb"><img src="{{asset('projects_images/'.$project->image)}}" alt="" data-rjs="2" data-rjs-processed="true"></a>
{{--                                <a href="#" class="icon"><i class="fa fa-star-o"></i></a>--}}

{{--                                <div class="post--map">--}}
{{--                                    <p class="btn-link"><i class="fa fa-map-o"></i>Location in Google Map</p>--}}

{{--                                    <div class="map--wrapper">--}}
{{--                                        <div data-map-latitude="23.790546" data-map-longitude="90.375583" data-map-zoom="6" data-map-marker="[[23.790546, 90.375583]]"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>

                            <div class="post--content">


                                <p>{{$project->description}}</p>
                            </div>
                        </div>
                        <!-- Post Item End -->


                        <!-- Post Related Start -->
                        <div class="post--related ptop--30">
                            <!-- Post Items Title Start -->
                            <div class="post--items-title" data-ajax="tab">
                                <h2 class="h4">مشاريع أخرى </h2>


{{--                                <div class="nav">--}}
{{--                                    <a href="#" class="prev btn-link" data-ajax-action="load_prev_related_posts">--}}
{{--                                        <i class="fa fa-long-arrow-left"></i>--}}
{{--                                    </a>--}}
{{--                                    <span class="divider">/</span>--}}
{{--                                </div>--}}

                            </div>
                            <!-- Post Items Title End -->

                            <!-- Post Items Start -->
                            <div class="post--items post--items-2" data-ajax-content="outer">
                                <ul class="nav row" data-ajax-content="inner">
                                    @foreach($projects as $project)
                                    <li class="col-sm-6 pbottom--30">
                                        <!-- Post Item Start -->
                                        <div class="post--item post--layout-1">
                                            <div class="post--img">
                                                <a href="{{route('projects.show',$project->id)}}" class="thumb"><img src="{{asset('projects_images/'.$project->image)}}" style="    width: 300px;height: 300px;" alt="" data-rjs="2" data-rjs-processed="true"></a>
{{--                                                <a href="#" class="cat">{{$project->category->name}}</a>--}}
{{--                                                <a href="#" class="icon"><i class="fa fa-flash"></i></a>--}}

                                                <div class="post--info">
                                                    <ul class="nav meta">
{{--                                                        <li><a href="#">Astaroth</a></li>--}}
                                                        <li><a href="{{route('projects.show',$project->id)}}">{{$project->created_at->diffForHumans()}}</a> </li>
                                                    </ul>

                                                    <div class="title">
                                                        <h3 class="h4"><a href="{{route('projects.show',$project->id)}}" class="btn-link">{{ Str::limit($project->title ,50)}}</a></h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="post--action">
                                                <a href="{{route('projects.show',$project->id)}}">عرض المزيد ... </a>
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
                        <!-- Post Related End -->


                        <div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 791px; height: 3661px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div></div>
                </div>
                <!-- Main Content End -->

                <!-- Main Sidebar Start -->
                <div class="main--sidebar col-md-4 ptop--30 pbottom--30" data-sticky-content="true" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                    <div class="sticky-content-inner" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">

<br>
<br>
<br>
<br>
<br>
<br>

                        <!-- Widget Start -->
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">اَخر الأخبار</h2>
                                <i class="icon fa fa-newspaper-o"></i>
                            </div>

                            <!-- List Widgets Start -->
                            <div class="list--widget list--widget-1">
                                <!-- Post Items Start -->
                                <div class="post--items post--items-3" data-ajax-content="outer">
                                    <ul class="nav" data-ajax-content="inner">
                                        @foreach($allPosts as $post)
                                        <li>
                                            <!-- Post Item Start -->
                                            <div class="post--item post--layout-3">
                                                <div class="post--img">
                                                    <a href="#" class="thumb"><img src="{{asset('postsImages/'.$post->image)}}" alt="" data-rjs="2" data-rjs-processed="true"></a>

                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">{{$post->category->name}}</a></li>
                                                            <li><a href="#">{{$post->created_at->diffForHumans()}}</a></li>
                                                        </ul>

                                                        <div class="title">
                                                            <h3 class="h4"><a href="#" class="btn-link">{{ Str::limit($post->title ,50)}}</a></h3>
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
                            <!-- List Widgets End -->
                        </div>
                        <!-- Widget End -->

                        <!-- Widget Start -->
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">إعلانات</h2>
                                <i class="icon fa fa-bullhorn"></i>
                            </div>

                            <!-- Ad Widget Start -->
                            <div class="ad--widget">
                                <a href="#">
                                    <img src="img/ads-img/ad-300x250-2.jpg" alt="" data-rjs="2" data-rjs-processed="true">
                                </a>
                            </div>
                            <!-- Ad Widget End -->
                        </div>
                        <!-- Widget End -->



                        <div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 400px; height: 4077px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div></div>
                </div>
                <!-- Main Sidebar End -->
            </div>
        </div>
    </div>

@endsection

