@extends('blog.app')

@section('title')
    {{'الإعلام'}}
@endsection

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
    <!-- News Ticker End -->

    <!-- Main Content Section Start -->
    <div class="main-content--section pbottom--30">
        <div class="container">
            <!-- Main Content Start -->


            <!-- Main Content End -->
        </div>
    </div>
    <!-- Main Content Section End -->
@endsection

