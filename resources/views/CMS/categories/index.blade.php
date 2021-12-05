@extends('CMS.parent')

@section('title')
    {{'Categories'}}
@endsection

@section('head')
    <link href="{{asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('Dashboard/assets/vendor/sweetalert/sweetalert.css')}}">

@endsection

@section('content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h1>Categories</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Categories</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    @if (session()->has('category_added'))

        <script>
            window.onload = function () {
                notif({
                    msg: "Category Added Successfully",
                    type: "success"
                });
            }
        </script>

    @endif

    @if (session()->has('category_deleted'))

        <script>
            window.onload = function () {
                notif({
                    msg: "Category Deleted Successfully",
                    type: "error",

                });
            }
        </script>

    @endif

    @if (session()->has('category_updated'))

        <script>
            window.onload = function () {
                notif({
                    msg: "Category Edited Successfully",
                    type: "info",
                    position: "right"
                });
            }
        </script>

    @endif

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Categories">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addCategory">Add Category</a></li>
                </ul>
                <div class="tab-content mt-0">

                    {{--Categories List--}}
                    <div class="tab-pane show active" id="Categories">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Posts Numbers</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $key => $category)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>
                                           <span class="badge badge-danger"> {{$category->posts->count()}}</span>
                                        </td>
                                        <td>{{$category->created_at->diffForHumans()}}</td>
                                        <td>

                                            <a href="{{ route('categories.edit', $category->id) }}">
                                              <span class="btn btn-sm btn-default">
                                                  <i class="fa fa-edit text-success"></i>
                                              </span>
                                            </a>

                                            <a  data-effect="effect-scale"
                                                data-id="{{ $category->id }}" data-name="{{ $category->name }}" data-toggle="modal"
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
                            {{$categories->links()}}
                        </div>
                    </div>

                    {{--Adding Category Form--}}
                    <div class="tab-pane" id="addCategory">
                        <div class="body mt-2">
                            <form action="{{route('categories.store')}}" method="POST">
                                @csrf
                                {{method_field('POST')}}
                                <div class="row clearfix">

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="name"> Name </label>
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="enter category name *">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
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
                    <h6 class="modal-title">Delete Category</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                    type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="categories/destroy" method="post">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p>Are you sure to delete this Category?</p><br>
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

@endsection
