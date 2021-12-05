@extends('CMS.parent')

@section('title')
    {{'Edit Post'}}

@endsection

@section('head')
    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        #img-upload{
            width: 100%
        }
    </style>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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


    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addPost">Edit Post</a></li>
                </ul>
                <div class="tab-content mt-0">


                    <div class="tab-pane active" id="addPost">
                        <div class="body mt-2">
                            <form action="{{route('posts.update',[$post->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row clearfix">

                                    <div class="col-12">
                                        <label for="name"> Title </label>
                                        <div class="form-group">
                                            <input type="text" name="title" id="title" value="{{$post->title}}" class="form-control @error('title') is-invalid @enderror">
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
                                            <textarea class="form-control" required="required" name="body" cols="50" rows="10" id="body">{!! $post->body !!}</textarea>
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
                                            <select class="form-control" required="required" id="tag_id[]" name="tag_id[]" multiple>
                                                @foreach($tags as $tag)
                                                    <option value="{{$tag->id}}"
                                                    @foreach($post->tags as $item)
                                                        {{$tag->id == $item->id ? 'selected':''}}
                                                        @endforeach
                                                    >{{$tag->name}}</option>

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
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                                @endforeach
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
                                                <input type="checkbox" id="Published" name="Published"  {{$post->status == 'Published' ? 'checked' : ''}}>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="imgInp" class="col-md-2 control-label">Image Upload</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                           Browse
                                            <input  id="imgInp" name="image" type="file"  class="form-control border-0">
                                        </span>
                                    </span>
                                                <input type="text" class="form-control" readonly >
                                            </div>
                                            <img id='img-upload' src="{{asset('postsImages/'.$post->image)}}" />
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


@endsection

@section('scripts')

    <script>
        $(document).ready( function() {
            $(document).on('change', '.btn-file :file', function() {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function(event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }

            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function(){
                readURL(this);
            });
        });
    </script>

@endsection
