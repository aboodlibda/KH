@extends('CMS.parent')

@section('title')
    {{'Edit User'}}
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
            /*min-height: 100vh;*/
            /*background-color: #757f9a;*/
            /*background-image: linear-gradient(147deg, #757f9a 0%, #d7dde8 100%);*/
        }

        /*
</style>
    <link href="{{asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>


@endsection

@section('content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h1>Users</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    @if (session()->has('user_edited'))

        <script>
            window.onload = function () {
                notif({
                    msg: "User Edited Successfully",
                    type: "success"
                });
            }
        </script>

    @endif

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#editUser">Edit User</a></li>
                </ul>
                <div class="tab-content mt-0">
                            {{--Adding imageUsers Form--}}
                    <div class="tab-pane show active" id="editUser">
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="body mt-2">
                            <form action="{{route('users.update',$user->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                {{method_field('put')}}
                            <div class="row clearfix">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="name"> Name </label>
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="email"> Email </label>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="password"> Password </label>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="enter password *">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="password_confirmation">Confirm Password </label>
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm password *">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <label>Upload Image</label>
                                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                        <input id="upload" name="image" type="file" onchange="readURL(this);" class="form-control border-0">
                                        <label id="upload-label" for="upload" class="font-weight-light text-muted">{{$user->image}}</label>
                                        <div class="input-group-append">
                                            <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                        </div>
                                    </div>

                                    <!-- Uploaded image area-->
                                    <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p>
                                    <div class="image-area mt-2"><img id="imageResult" src="{{asset('usersImages/'.$user->image)}}" alt="" class="img-thumbnail rounded shadow-sm mx-sm-2" style="height: 100px;width: 100px"></div>

                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
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
    <script src="{{asset('assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection
