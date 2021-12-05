@extends('CMS.parent')

@section('title')
    {{'Projects'}}
@endsection

@section('head')
    <style>
        /*
    *
    * ==========================================
    * CUSTOM UTIL CLASSES
    * ==========================================
    *
    */
        #upload {
            opacity: 0;
        }

        #upload-label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
        }

        .image-area {
            border: 2px dashed rgba(255, 255, 255, 0.7);
            padding: 1rem;
            position: relative;
        }

        .image-area::before {
            content: 'Uploaded image result';
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.8rem;
            z-index: 1;
        }

        .image-area img {
            z-index: 2;
            position: relative;
        }

        /*
        *
        * ==========================================
        * FOR DEMO PURPOSES
        * ==========================================
        *
        */
        body {
            min-height: 100vh;
            background-color: #757f9a;
            background-image: linear-gradient(147deg, #757f9a 0%, #d7dde8 100%);
        }

        /*
</style>
    <link href="{{asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('Dashboard/assets/vendor/sweetalert/sweetalert.css')}}">


@endsection

@section('content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h1>Projects</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Projects</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    @if (session()->has('user_added'))

        <script>
            window.onload = function () {
                notif({
                    msg: "User Added Successfully",
                    type: "success"
                });
            }
        </script>

    @endif

    @if (session()->has('User_deleted'))

        <script>
            window.onload = function () {
                notif({
                    msg: "User Deleted Successfully",
                    type: "error",

                });
            }
        </script>

    @endif

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Projects">Projects</a></li>
                </ul>
                <div class="tab-content mt-0">

                            {{--imageUsers List--}}
                    <div class="tab-pane show active" id="Projects">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>entrepreneur</th>
                                    <th>Requested Financing</th>
                                    <th>Country</th>
                                    <th>Category</th>
                                    <th>publication Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td class="w60">
                                        <img src="{{asset('Images/'.$project->image)}}" data-toggle="tooltip" data-placement="top" title="{{$project->title}}" alt="Avatar" class="w35 h35 rounded">
                                    </td>
                                    <td>{{$project->title}}</td>
                                    <td>{{$project->user->name}}</td>
                                    <td>{{$project->requested_financing}}</td>
                                    <td>{{$project->country}}</td>
                                    <td>{{$project->category}}</td>
                                    <td>{{$project->publication_date}}</td>
                                    <td>
                                        @php
                                            $one = strtoupper('doggy');
                                            $two = strtoupper('Dog');
                                            $result = similar_text ($one, $two, $percent);
                                            print $percent
                                        @endphp
                                    </td>
                                    <td>

                                            <a href="{{ route('projects.show', $project->id) }}" title="show">
                                                <span class="btn btn-sm btn-default">
                                                    <i class="icon-eye text-primary"></i>
                                                </span>
                                            </a>

                                            <a href="{{ route('projects.edit', $project->id) }}">
                                              <span class="btn btn-sm btn-default">
                                                  <i class="fa fa-edit text-success"></i>
                                              </span>

                                            </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                           <div class="pagination mb-0"> {!! $projects->render("pagination::bootstrap-4") !!} </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="{{asset('assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>
    <script src="{{asset('Dashboard/assets/vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/modal.js')}}"></script>


    <script>
        /*  ==========================================
        SHOW UPLOADED IMAGE
    * ========================================== */
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imageResult')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $('#upload').on('change', function () {
                readURL(input);
            });
        });

        /*  ==========================================
            SHOW UPLOADED IMAGE NAME
        * ========================================== */
        var input = document.getElementById( 'upload' );
        var infoArea = document.getElementById( 'upload-label' );

        input.addEventListener( 'change', showFileName );
        function showFileName( event ) {
            var input = event.srcElement;
            var fileName = input.files[0].name;
            infoArea.textContent = 'File name: ' + fileName;
        }
    </script>
@endsection
