@extends('CMS.parent')

@section('title')
    {{'Home'}}
@endsection

@section('content')

    <div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Blog App</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></li>
                </ol>
            </nav>
        </div>
    </div>
    </div>



    <div class="row clearfix">

        <div class="col-md-8">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="body ribbon">
                            <div class="ribbon-box green">
                                {{$users_count}}
                            </div>
                            <a href="{{route('users.index')}}" class="my_sort_cut text-muted">
                                <i class="icon-users"></i>
                                <span>Users</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="body ribbon">
                            <div class="ribbon-box orange">
                                {{$posts_count}}
                            </div>
                            <a href="{{route('posts.index')}}" class="my_sort_cut text-muted">
                                <i class="icon-grid"></i>
                                <span>Posts</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="body ribbon">
                            <div class="ribbon-box green">
                                {{$categories_count}}
                            </div>
                            <a href="{{route('categories.index')}}" class="my_sort_cut text-muted">
                                <i class="fa fa-list-alt"></i>
                                <span>Categories</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="body ribbon">
                            <div class="ribbon-box orange">
                                {{$tags_count}}
                            </div>
                            <a href="{{route('tags.index')}}" class="my_sort_cut text-muted">
                                <i class="fa fa-tags"></i>
                                <span>Tags</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div id="slider4" class="carousel slide" data-ride="carousel" data-interval="2000">
                            <div class="carousel-inner">
                                @foreach($slides as $key => $slide)
                                    <div class="carousel-item {{$key == 0 ? 'active' : ''}}" >
                                        <h3 style="position: absolute; top: 65%; left: 5%; color: #fff; z-index: 1;"> {{  substr($slide->title, 0, 100)}}{{strlen($slide->title) > 100 ? '...' : ''}}</h3>
                                        <p style="position: absolute; top: 75%; left: 5%; color: #fff; z-index: 1;">{{  substr($slide->body, 0, 200)}} {{strlen($slide->body) > 200 ? '...' : ''}}</p>
                                        <img class="card-img-top" src="{{asset('postsImages/'.$slide->image)}}" alt="Card image cap" style="opacity: 0.7;">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <div class="row clearfix">
                                <div class="col-6">
                                    <i class="icon-grid"></i>
                                    <div><span class="text-muted">{{$posts_count}} Posts</span></div>
                                </div>
                                <div class="col-6">
                                    <i class="fa fa-eye font-22"></i>
                                    <div><span class="text-muted">1k Views</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card c_grid c_yellow">
                        <div class="body">
                            <div class="circle">
                                <img class="rounded-circle" src="{{Auth::user()->image == 'user.png' ? asset('user.png') : asset('usersImages/'.Auth::user()->image) }}" alt="">
                            </div>
                            <div class="text-center mb-5">
                                <h6 class="mt-3 mb-0">{{Auth::user()->name}}</h6>
                                <span>{{Auth::user()->email}}</span>
                                <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                    <li><a class="p-3" target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="p-3" target="_blank" href="#"><i class="fa fa-slack"></i></a></li>
                                    <li><a class="p-3" target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                            {{--                    <div class="card-text">--}}
                            {{--                        <div class="mt-0">--}}
                            {{--                            <small class="float-right text-muted">60%</small>--}}
                            {{--                            <span>Bootstrap</span>--}}
                            {{--                            <div class="progress progress-xxs">--}}
                            {{--                                <div style="width: 60%;" class="progress-bar"></div>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                            {{--                        <div class="mt-4">--}}
                            {{--                            <small class="float-right text-muted">85%</small>--}}
                            {{--                            <span>HTML</span>--}}
                            {{--                            <div class="progress progress-xxs">--}}
                            {{--                                <div style="width: 85%;" class="progress-bar bg-green"></div>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                            {{--                        <div class="mt-4">--}}
                            {{--                            <small class="float-right text-muted">40%</small>--}}
                            {{--                            <span>CSS</span>--}}
                            {{--                            <div class="progress progress-xxs">--}}
                            {{--                                <div style="width: 40%;" class="progress-bar"></div>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                            {{--                        <div class="mt-4">--}}
                            {{--                            <small class="float-right text-muted">80%</small>--}}
                            {{--                            <span>Javascript</span>--}}
                            {{--                            <div class="progress progress-xxs">--}}
                            {{--                                <div style="width: 80%;" class="progress-bar bg-danger"></div>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                            {{--                    </div>--}}
                        </div>
                    </div>
                    <div class="card setting_switch">
                        <div class="header">
                            <h2>Settings</h2>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                Light Version
                                <div class="float-right">
                                    <label class="switch">
                                        <input type="checkbox" class="lv-btn">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                RTL Version
                                <div class="float-right">
                                    <label class="switch">
                                        <input type="checkbox" class="rtl-btn">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                Horizontal Henu
                                <div class="float-right">
                                    <label class="switch">
                                        <input type="checkbox" class="hmenu-btn" disabled="disabled">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                Mini Sidebar
                                <div class="float-right">
                                    <label class="switch">
                                        <input type="checkbox" class="mini-sidebar-btn" disabled="disabled">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

{{--        ****************************************--}}





    </div>
















@endsection
