<!doctype html>
<html lang="en">

<head>
    <title>Dashboard | @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description"
          content="Oculux Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Oculux admin template, dashboard template, flat admin template, responsive admin template, web app, Light Dark version">
    <meta name="author" content="GetBootstrap, design by: puffintheme.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('Dashboard/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Dashboard/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('Dashboard/assets/vendor/animate-css/vivify.min.css')}}">


    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/site.min.css')}}">
    @yield('head')

</head>
<body class="theme-cyan font-montserrat dark_version">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper">
    <nav class="navbar top-navbar">
        <div class="container-fluid">

            <div class="navbar-left">
                <div class="navbar-btn">
                    <a href="index.html"><img src="{{asset('Dashboard/assets/images/icon-color.svg')}}" alt="Oculux Logo" class="img-fluid logo"></a>
                    <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                </div>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="icon-envelope"></i>
                            <span class="notification-dot bg-green">4</span>
                        </a>
                        <ul class="dropdown-menu right_chat email vivify fadeIn">
                            <li class="header green">You have 4 New eMail</li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="avtar-pic w35 bg-red"><span>FC</span></div>
                                        <div class="media-body">
                                            <span class="name">James Wert <small
                                                    class="float-right text-muted">Just now</small></span>
                                            <span class="message">Update GitHub</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="avtar-pic w35 bg-indigo"><span>FC</span></div>
                                        <div class="media-body">
                                            <span class="name">Folisise Chosielie <small class="float-right text-muted">12min ago</small></span>
                                            <span class="message">New Messages</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object " src="{{asset('Dashboard/assets/images/xs/avatar5.jpg')}}" alt="">
                                        <div class="media-body">
                                            <span class="name">Louis Henry <small class="float-right text-muted">38min ago</small></span>
                                            <span class="message">Design bug fix</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media mb-0">
                                        <img class="media-object " src="{{asset('Dashboard/assets/images/xs/avatar2.jpg')}}" alt="">
                                        <div class="media-body">
                                            <span class="name">Debra Stewart <small class="float-right text-muted">2hr ago</small></span>
                                            <span class="message">Fix Bug</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="icon-bell"></i>
                            <span class="notification-dot bg-azura">4</span>
                        </a>
                        <ul class="dropdown-menu feeds_widget vivify fadeIn">
                            <li class="header blue">You have 4 New Notifications</li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="feeds-left bg-red"><i class="fa fa-check"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title text-danger">Issue Fixed <small class="float-right text-muted">9:10
                                                AM</small></h4>
                                        <small>WE have fix all Design bug with Responsive</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="feeds-left bg-info"><i class="fa fa-user"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title text-info">New User <small class="float-right text-muted">9:15
                                                AM</small></h4>
                                        <small>I feel great! Thanks team</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="feeds-left bg-orange"><i class="fa fa-question-circle"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title text-warning">Server Warning <small
                                                class="float-right text-muted">9:17 AM</small></h4>
                                        <small>Your connection is not private</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="feeds-left bg-green"><i class="fa fa-thumbs-o-up"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title text-success">2 New Feedback <small
                                                class="float-right text-muted">9:22 AM</small></h4>
                                        <small>It will give a smart finishing to your site</small>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown language-menu">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="fa fa-language"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item pt-2 pb-2" href="#"><img src="{{asset('Dashboard/assets/images/flag/us.svg')}} "
                                                                             class="w20 mr-2 rounded-circle"> US English</a>
                            <a class="dropdown-item pt-2 pb-2" href="#"><img src="{{asset('Dashboard/assets/images/flag/gb.svg')}} "
                                                                             class="w20 mr-2 rounded-circle"> UK English</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item pt-2 pb-2" href="#"><img src="{{asset('Dashboard/assets/images/flag/russia.svg')}} "
                                                                             class="w20 mr-2 rounded-circle">
                                Russian</a>
                            <a class="dropdown-item pt-2 pb-2" href="#"><img src="{{asset('Dashboard/assets/images/flag/arabia.svg')}} "
                                                                             class="w20 mr-2 rounded-circle"> Arabic</a>
                            <a class="dropdown-item pt-2 pb-2" href="#"><img src="{{asset('Dashboard/assets/images/flag/france.svg')}} "
                                                                             class="w20 mr-2 rounded-circle"> French</a>
                        </div>
                    </li>


                </ul>
            </div>

            <div class="navbar-right">
                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                        <li><a href="javascript:void(0);" class="search_toggle icon-menu" title="Search Result"><i
                                    class="icon-magnifier"></i></a></li>
                        <li><a href="javascript:void(0);" class="right_toggle icon-menu" title="Right Menu"><i
                                    class="icon-bubbles"></i><span class="notification-dot bg-pink">2</span></a></li>
                        <li>
{{--                            <a href="page-login.html" class="icon-menu"><i class="icon-power"></i></a>--}}
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  class="icon-menu"><i class="icon-power"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="progress-container">
            <div class="progress-bar" id="myBar"></div>
        </div>
    </nav>

    <div class="search_div">
        <div class="card">
            <div class="body">
                <form id="navbar-search" class="navbar-form search-form">
                    <div class="input-group mb-0">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="icon-magnifier"></i></span>
                            <a href="javascript:void(0);" class="search_toggle btn btn-danger"><i
                                    class="icon-close"></i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <span>Search Result <small class="float-right text-muted">About 90 results (0.47 seconds)</small></span>
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing5">
                <tbody>
                <tr>
                    <td class="w40">
                        <span>01</span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="avtar-pic w35 bg-red" data-toggle="tooltip" data-placement="top" title=""
                                 data-original-title="Avatar Name"><span>SS</span></div>
                            <div class="ml-3">
                                <a href="page-invoices-detail.html" title="">South Shyanne</a>
                                <p class="mb-0">south.shyanne@example.com</p>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>02</span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{asset('Dashboard/assets/images/xs/avatar2.jpg')}}" data-toggle="tooltip" data-placement="top"
                                 title="" alt="Avatar" class="w35 h35 rounded" data-original-title="Avatar Name">
                            <div class="ml-3">
                                <a href="javascript:void(0);" title="">Zoe Baker</a>
                                <p class="mb-0">zoe.baker@example.com</p>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>03</span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="avtar-pic w35 bg-indigo" data-toggle="tooltip" data-placement="top" title=""
                                 data-original-title="Avatar Name"><span>CB</span></div>
                            <div class="ml-3">
                                <a href="javascript:void(0);" title="">Colin Brown</a>
                                <p class="mb-0">colinbrown@example.com</p>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>04</span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="avtar-pic w35 bg-green" data-toggle="tooltip" data-placement="top" title=""
                                 data-original-title="Avatar Name"><span>KG</span></div>
                            <div class="ml-3">
                                <a href="javascript:void(0);" title="">Kevin Gill</a>
                                <p class="mb-0">kevin.gill@example.com</p>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>05</span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{asset('Dashboard/assets/images/xs/avatar5.jpg')}}" data-toggle="tooltip" data-placement="top"
                                 title="" alt="Avatar" class="w35 h35 rounded" data-original-title="Avatar Name">
                            <div class="ml-3">
                                <a href="javascript:void(0);" title="">Brandon Smith</a>
                                <p class="mb-0">Maria.gill@example.com</p>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>06</span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{asset('Dashboard/assets/images/xs/avatar6.jpg')}}" data-toggle="tooltip" data-placement="top"
                                 title="" alt="Avatar" class="w35 h35 rounded" data-original-title="Avatar Name">
                            <div class="ml-3">
                                <a href="javascript:void(0);" title="">Kevin Baker</a>
                                <p class="mb-0">kevin.baker@example.com</p>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>07</span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{asset('Dashboard/assets/images/xs/avatar2.jpg')}}" data-toggle="tooltip" data-placement="top"
                                 title="" alt="Avatar" class="w35 h35 rounded" data-original-title="Avatar Name">
                            <div class="ml-3">
                                <a href="javascript:void(0);" title="">Zoe Baker</a>
                                <p class="mb-0">zoe.baker@example.com</p>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div id="rightbar" class="rightbar">
        <div class="body">
            <ul class="nav nav-tabs2">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Chat-one">Chat</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat-list">List</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat-groups">Groups</a></li>
            </ul>
            <hr>
            <div class="tab-content">
                <div class="tab-pane vivify fadeIn delay-100 active" id="Chat-one">
                    <div class="chat_detail">
                        <ul class="chat-widget clearfix">
                            <li class="left float-left">
                                <div class="avtar-pic w35 bg-pink"><span>KG</span></div>
                                <div class="chat-info">
                                    <span class="message">Hello, John<br>What is the update on Project X?</span>
                                </div>
                            </li>
                            <li class="right">
                                <img src="{{asset('dahboard/assets/images/xs/avatar1.jpg')}}" class="rounded" alt="">
                                <div class="chat-info">
                                    <span class="message">Hi, Alizee<br> It is almost completed. I will send you an email later today.</span>
                                </div>
                            </li>
                            <li class="left float-left">
                                <div class="avtar-pic w35 bg-pink"><span>KG</span></div>
                                <div class="chat-info">
                                    <span class="message">That's great. Will catch you in evening.</span>
                                </div>
                            </li>
                            <li class="right">
                                <img src="{{asset('Dashboard/assets/images/xs/avatar1.jpg')}}" class="rounded" alt="">
                                <div class="chat-info">
                                    <span class="message">Sure we'will have a blast today.</span>
                                </div>
                            </li>
                        </ul>
                        <div class="input-group mb-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <a href="javascript:void(0);" class=""><i class="icon-camera text-warning"></i></a>
                                </span>
                            </div>
                            <textarea type="text" row="" class="form-control"
                                      placeholder="Enter text here..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="tab-pane vvivify fadeIn delay-100" id="Chat-list">
                    <ul class="right_chat list-unstyled mb-0">
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-red"><span>FC</span></div>
                                    <div class="media-body">
                                        <span class="name">Folisise Chosielie</span>
                                        <span class="message">offline</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{asset('Dashboard/assets/images/xs/avatar3.jpg')}}" alt="">
                                    <div class="media-body">
                                        <span class="name">Marshall Nichols</span>
                                        <span class="message">online</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-red"><span>FC</span></div>
                                    <div class="media-body">
                                        <span class="name">Louis Henry</span>
                                        <span class="message">online</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-orange"><span>DS</span></div>
                                    <div class="media-body">
                                        <span class="name">Debra Stewart</span>
                                        <span class="message">online</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-green"><span>SW</span></div>
                                    <div class="media-body">
                                        <span class="name">Lisa Garett</span>
                                        <span class="message">offline since May 12</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{asset('Dashboard/assets/images/xs/avatar5.jpg')}}" alt="">
                                    <div class="media-body">
                                        <span class="name">Debra Stewart</span>
                                        <span class="message">online</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{asset('Dashboard/assets/images/xs/avatar2.jpg')}}" alt="">
                                    <div class="media-body">
                                        <span class="name">Lisa Garett</span>
                                        <span class="message">offline since Jan 18</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-indigo"><span>FC</span></div>
                                    <div class="media-body">
                                        <span class="name">Louis Henry</span>
                                        <span class="message">online</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-pink"><span>DS</span></div>
                                    <div class="media-body">
                                        <span class="name">Debra Stewart</span>
                                        <span class="message">online</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-info"><span>SW</span></div>
                                    <div class="media-body">
                                        <span class="name">Lisa Garett</span>
                                        <span class="message">offline since May 12</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane vivify fadeIn delay-100" id="Chat-groups">
                    <ul class="right_chat list-unstyled mb-0">
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-cyan"><span>DT</span></div>
                                    <div class="media-body">
                                        <span class="name">Designer Team</span>
                                        <span class="message">offline</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-azura"><span>SG</span></div>
                                    <div class="media-body">
                                        <span class="name">Sale Groups</span>
                                        <span class="message">online</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-orange"><span>NF</span></div>
                                    <div class="media-body">
                                        <span class="name">New Fresher</span>
                                        <span class="message">online</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-indigo"><span>PL</span></div>
                                    <div class="media-body">
                                        <span class="name">Project Lead</span>
                                        <span class="message">offline since May 12</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <a href="{{route('dashboard')}}"><img src="{{asset('Dashboard/assets/images/icon.svg')}}" alt="Oculux Logo" class="img-fluid logo"><span>Blog App</span></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i
                    class="lnr lnr-menu icon-close"></i></button>
        </div>
        <div class="sidebar-scroll">
            <div class="user-account">
                <div class="user_div">
                    @if(Auth::check())
                        <img src="{{Auth::user()->image == 'user.png' ? asset('user.png') : asset('usersImages/'.Auth::user()->image) }}" class="user-photo" alt="User Profile Picture">
                    @else
                    @endif



                </div>
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>

                                @if(Auth::check())
                                {{ Auth::user()->name }}
                            @else
                            @endif

                        </strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
{{--                        <li><a href="{{route('profile'.Auth::guard('financier')->user('id'))}}"><i class="icon-user"></i>My Profile</a></li>--}}
                        <li><a href="{{route('users.edit',Auth::id())}}"><i class="icon-user"></i>Profile</a></li>
                        <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  class="icon-menu"><i class="icon-power"></i>Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="header">Main</li>
                    <li><a href="{{route('home')}}"><i class="icon-home"></i><span>Home</span></a></li>
                    <li class=""><a href="{{route('dashboard')}}"><i
                                class="icon-speedometer"></i><span>HR Dashboard</span></a></li>
                    <li><a href="{{route('posts.index')}}"><i class="icon-note"></i><span>Posts</span></a></li>
                    <li><a href="{{route('categories.index')}}"><i class="icon-grid"></i><span>Categories</span></a></li>
                    <li><a href="{{route('tags.index')}}"><i class="icon-tag"></i><span>Tags</span></a></li>
                    <li><a href="{{route('users.index')}}"><i class="icon-users"></i><span>Users</span></a></li>
                    <li><a href="{{route('projects.index')}}"><i class="icon-menu"></i><span>Projects</span></a></li>
                    <li><a href="{{route('transactions.index')}}"><i class="fa fa-question"></i><span>Transaction</span></a></li>
                    <li><a href="{{route('complaints.index')}}"><i class="fa fa-warning"></i><span>Complaint</span></a></li>
                    <li>
                        <a href="" class="has-arrow"><i class="icon-settings"></i><span>Front End Elements</span></a>
                        <ul>
                            <li><a href="#">Home Page</a></li>
                            <li><a href="#">Projects Page</a></li>
                            <li><a href="index5.html">Financiers Page</a></li>
                            <li><a href="index6.html">Entrepreneurs Page</a></li>
                            <li><a href="index7.html">About Pasge</a></li>
                            <li><a href="#">How It Work Page</a></li>

                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </div>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">


                @yield('content')
            </div>
        </div>
    </div>

</div>

<!-- Javascript -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script>

<script src="{{asset('assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/flotscripts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/jvectormap.bundle.js')}}"></script>
<script src="{{asset('Dashboard/assets/vendor/jvectormap/jquery-jvectormap-us-aea-en.js')}}"></script>

<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('assets/js/hrdashboard.js')}}"></script>
@yield('scripts')
</body>
</html>
