@extends('CMS.parent')

@section('title')
    {{'Users'}}
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
    <link rel="stylesheet" href="{{asset('Dashboard/assets/vendor/sweetalert/sweetalert.css')}}">
@endsection

@section('content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h1>Users</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Users">Users</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addUser">Add User</a></li>
                </ul>
                <div class="tab-content mt-0">

                            {{--imageUsers List--}}
                    <div class="tab-pane show active" id="Users">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Join Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td class="w60">
{{--                                        <label class="fancy-checkbox">--}}
{{--                                            <input class="checkbox-tick" type="checkbox" name="checkbox">--}}
{{--                                            <span></span>--}}
{{--                                        </label>--}}
                                        <img src="{{$user->image == 'user.png' ? asset('user.png') : asset('usersImages/'.$user->image) }}" alt="User Profile Picture" data-toggle="tooltip" data-placement="top" title="{{$user->name}}"  class="w35 h35 rounded">
                                    </td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at->toFormattedDateString()}}</td>
                                    <td>

                                            <a href="{{ route('users.show', $user->id) }}" title="show">
                                                <span class="btn btn-sm btn-default">
                                                    <i class="icon-eye text-primary"></i>
                                                </span>
                                            </a>

                                            <a href="{{ route('users.edit', $user->id) }}">
                                              <span class="btn btn-sm btn-default">
                                                  <i class="fa fa-edit text-success"></i>
                                              </span>

                                            </a>

                                        <a  data-effect="effect-scale"
                                            data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-toggle="modal"
                                            href="#modaldemo9" >
                                              <span class="btn btn-sm btn-default">
                                           <i class="fa fa-trash-o text-danger"></i>
                                              </span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="text-center">
                        {{$users->links()}}
                    </div>

                            {{--Adding imageUsers Form--}}
                    <div class="tab-pane" id="addUser">
                        <div class="body mt-2">
                            <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{method_field('POST')}}
                            <div class="row clearfix">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="name"> Name </label>
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="enter your name *">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="email"> Email </label>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="enter your email *">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="password"> Password </label>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="enter password *">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
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
                                        <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                                        <div class="input-group-append">
                                            <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                        </div>
                                    </div>

                                    <!-- Uploaded image area-->
                                    <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p>
                                    <div class="image-area mt-2"><img id="imageResult" src="#" alt="" class="img-thumbnail rounded shadow-sm mx-sm-2" style="height: 100px;width: 100px"></div>

                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- delete -->
    <div class="modal" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Delete User</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                  type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="users/destroy" method="post">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p>Are you sure to delete this user?</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="name" id="name" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
            </div>
            </form>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="{{asset('assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>
    <script src="{{asset('Dashboard/assets/vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/modal.js')}}"></script>

    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        })
    </script>

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
