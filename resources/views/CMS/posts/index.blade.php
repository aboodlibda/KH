@extends('CMS.parent')

@section('title')
    {{'Posts'}}
@endsection

@section('head')
    @include('partials._links')
    <link href="{{asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('Dashboard/assets/vendor/sweetalert/sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('Dashboard/assets/vendor/dropify/css/dropify.min.css')}}">

@endsection

@section('content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h1>Posts</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Posts</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    @if (session()->has('post_added'))

        <script>
            window.onload = function () {
                notif({
                    msg: "Post Added Successfully",
                    type: "success"
                });
            }
        </script>

    @endif

    @if (session()->has('post_deleted'))

        <script>
            window.onload = function () {
                notif({
                    msg: "Post Deleted Successfully",
                    type: "error",

                });
            }
        </script>

    @endif

    @if (session()->has('post_updated'))

        <script>
            window.onload = function () {
                notif({
                    msg: "Post Updated Successfully",
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
                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Posts">Post</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addPost">Add Post</a></li>
                </ul>


                <div class="tab-content mt-0">

                    <div class="tab-pane show active" id="Posts">

                        <div class="table-responsive">
                            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table class="table table-striped table-hover dataTable js-exportable" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending"
                                             aria-label="Name: activate to sort column descending" style="width: 298.688px;">Title</th>

                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                             aria-label="Position: activate to sort column ascending" style="width: 108.662px;">Image</th>

                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                            aria-label="Office: activate to sort column ascending" style="width: 139.7px;">Author</th>

                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                            aria-label="Age: activate to sort column ascending" style="width: 65.125px;">Categroy</th>

                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                            aria-label="Salary: activate to sort column ascending" style="width: 108.662px;">Tags</th>

                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                            aria-label="Salary: activate to sort column ascending" style="width: 108.662px;">Status</th>

                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                            aria-label="Salary: activate to sort column ascending" style="width: 108.662px;">Action</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($posts as $post)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{  substr($post->title, 0, 50)}}{{strlen($post->title) > 50 ? '...' : ''}}</td>
                                        <td>
                                            <img src="{{asset('postsImages/'.$post->image)}}" data-toggle="tooltip" data-placement="top" title="{{$post->title}}" alt="Avatar" class="w60 h60 rounded">
                                        </td>
                                        <td><span class="badge badge-success">{{$post->user->name}}</span></td>
                                        <td>
                                            <a href="{{route('categories.index')}}" class="badge badge-primary">
                                                {{$post->category->name}}
                                            </a>
                                        </td>
                                        <td>
                                            @foreach($post->tags as $tag)
                                            <a href="{{route('tags.index')}}" class="badge badge-info">{{$tag->name}}</a><br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($post->status == 'Published')
                                            <span class="badge badge-success">{{($post->status)}}</span>
                                            @else
                                                <span class="badge badge-danger">{{($post->status)}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('publish',$post->id)}}"
                                               @if($post->status == 'Published')
                                               data-toggle="tooltip" data-placement="top" title="UnPublish"
                                               @else
                                               data-toggle="tooltip" data-placement="top" title="Publish" >
                                                @endif
                                                <span class="btn btn-sm btn-default">
                                                    <i class="fa {{$post->status == 'Published' ? "fa-minus-square-o text-danger" : "fa-check-square-o text-success"}}">  </i>
                                                </span>
                                            </a>
                                            <a href="{{ route('posts.show', $post->id) }}" title="show">
                                                <span class="btn btn-sm btn-default">
                                                    <i class="icon-eye text-primary"></i>
                                                </span>
                                            </a>

                                            <a href="{{ route('posts.edit', $post->id) }}">
                                                <span class="btn btn-sm btn-default">
                                                    <i class="fa fa-edit text-success"></i>
                                                </span>

                                            </a>

                                            <a  data-effect="effect-scale"
                                                data-id="{{ $post->id }}" data-name="{{ $post->title }}" data-toggle="modal"
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

{{--                            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>Title</th>--}}
{{--                                    <th>Image</th>--}}
{{--                                    <th>Author</th>--}}
{{--                                    <th>Category</th>--}}
{{--                                    <th>Tags</th>--}}
{{--                                    <th>Status</th>--}}
{{--                                    <th>Action</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($posts as $post)--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            {{  substr($post->title, 0, 50)}}{{strlen($post->title) > 50 ? '...' : ''}}--}}
{{--                                        </td>--}}
{{--                                        <td class="w60">--}}
{{--                                            <img src="{{asset('postsImages/'.$post->image)}}" data-toggle="tooltip" data-placement="top" title="{{$post->title}}" alt="Avatar" class="w60 h60 rounded">--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <span class="badge badge-success">{{$post->user->name}}</span>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <a href="{{route('categories.index')}}" class="badge badge-primary">--}}
{{--                                                {{$post->category->name}}--}}
{{--                                            </a>--}}
{{--                                        </td>--}}

{{--                                        <td>--}}
{{--                                            @foreach($post->tags as $tag)--}}
{{--                                                <a href="{{route('tags.index')}}" class="badge badge-info">{{$tag->name}}</a><br>--}}
{{--                                            @endforeach--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if($post->status == 'Published')--}}
{{--                                                <span class="badge badge-success">{{($post->status)}}</span>--}}
{{--                                            @else--}}
{{--                                                <span class="badge badge-danger">{{($post->status)}}</span>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}

{{--                                        <td>--}}
{{--                                            <a href="{{route('publish',$post->id)}}"--}}
{{--                                               @if($post->status == 'Published')--}}
{{--                                               data-toggle="tooltip" data-placement="top" title="UnPublish"--}}
{{--                                            @else--}}
{{--                                               data-toggle="tooltip" data-placement="top" title="Publish" >--}}
{{--                                                @endif--}}
{{--                                             <span class="btn btn-sm btn-default">--}}
{{--                                            <i class="fa {{$post->status == 'Published' ? "fa-minus-square-o text-danger" : "fa-check-square-o text-success"}}">  </i>--}}
{{--                                              </span>--}}
{{--                                            </a>--}}
{{--                                            <a href="{{ route('posts.show', $post->id) }}" title="show">--}}
{{--                                                <span class="btn btn-sm btn-default">--}}
{{--                                                    <i class="icon-eye text-primary"></i>--}}
{{--                                                </span>--}}
{{--                                            </a>--}}

{{--                                            <a href="{{ route('posts.edit', $post->id) }}">--}}
{{--                                              <span class="btn btn-sm btn-default">--}}
{{--                                                  <i class="fa fa-edit text-success"></i>--}}
{{--                                              </span>--}}

{{--                                            </a>--}}

{{--                                            <a  data-effect="effect-scale"--}}
{{--                                                data-id="{{ $post->id }}" data-name="{{ $post->title }}" data-toggle="modal"--}}
{{--                                                href="#modaldemo9" >--}}
{{--                                              <span class="btn btn-sm btn-default">--}}
{{--                                           <i class="fa fa-trash-o text-danger"></i>--}}
{{--                                              </span>--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                            {{$posts->links()}}--}}
                        </div>

                    </div>



                    <div class="tab-pane" id="addPost">
                        <div class="body mt-2">
                            <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{method_field('POST')}}
                                <div class="row clearfix">

                                    <div class="col-12">
                                        <label for="name"> Title </label>
                                        <div class="form-group">
                                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{--body--}}
                                    <div class="col-12">
                                        <label for="body">Body</label>

                                        <div class="form-group">
                                            <textarea class="form-control" required="required" name="body" cols="50" rows="10" id="body"></textarea>
                                            @error('body')
                                            <span class="text-danger">
                                    {{$message}}
                                </span>
                                            @enderror

                                            <span class="help-block">
                        <strong></strong>
                      </span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="tag_id">Tags</label>
                                        <div class="form-group">

                                                <select class="form-control" required="required" id="tag_id" name="tag_id[]"  multiple>
                                                    @foreach($tags as $tag)
                                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('tag_id')
                                                <span class="text-danger">
                                    {{$message}}
                                </span>
                                                @enderror
                                                <span class="help-block">
                        <strong></strong>
                      </span>
                                            </div>


                                </div>

                                    <div class="col-12">
                                        <label for="category_id">Category</label>

                                        <div class="form-group">
                                            <select class="form-control" required="required" id="category_id" name="category_id">
                                                <option value="" selected disabled hidden>-- select category --</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            </select>

                                            <span class="help-block">
                        <strong></strong>
                      </span>
                                        </div>
                                        @error('category_id')
                                        <span class="text-danger">
                                    {{$message}}
                                </span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="Published">Publishing Status</label>
                                        <div class="form-group">
                                        <label class="switch">
                                            <input type="checkbox" id="Published" name="Published" >
                                            <span class="slider round"></span>
                                        </label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group mt-3 mb-5">
                                            <div class="dropify-wrapper">
                                                <div class="dropify-message">
                                                    <span class="file-icon"></span>
                                                    <p>Drag and drop a file here or click</p>
                                                    <p class="dropify-error">Ooops, something wrong appended.</p>
                                                </div><div class="dropify-loader"></div>
                                                <div class="dropify-errors-container"><ul></ul></div>
                                                <input type="file" class="dropify" name="image">
                                                <button type="button" class="dropify-clear">Remove</button>
                                                <div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner">
                                                            <p class="dropify-filename"><span class="file-icon"></span>
                                                                <span class="dropify-filename-inner"></span>
                                                            </p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div>
                                            <small id="fileHelp" class="form-text text-muted"> @error('image')
                                                <span class="text-danger">
                                    {{$message}}
                                </span>
                                                @enderror</small>
                                        </div>

                                    </div>
                                    </div>


                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Add</button>
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
                    <h6 class="modal-title">Delete Post</h6><button aria-label="Close" class="close" data-dismiss="modal"
                     type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="posts/destroy" method="post">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p>Are you sure to delete this Post?</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="name" id="name" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>

            </form>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="{{asset('assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>
    <script src="{{asset('Dashboard/assets/vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/modal.js')}}"></script>
    <script src="{{asset('Dashboard/assets/vendor/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script>
    <script src="{{asset('assets/js/pages/forms/dropify.js')}}"></script>

    @include('partials._scripts')

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
