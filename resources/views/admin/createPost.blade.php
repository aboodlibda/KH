@extends('admin.master2')
@section('title')
    {{'Create-Post'}}
@endsection

@section('style')
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Create Post

                        <a href="/admin/posts" class="btn btn-default pull-right"
                        >Go Back</a
                        >
                    </h2>
                </div>

                <div class="panel-body">
                    <form method="POST" action="{{route('posts.store')}}" accept-charset="UTF-8" class="form-horizontal" role="form" enctype="multipart/form-data">
                        @csrf
{{--                                title--}}
                        <div class="form-group">
                            <label for="title" class="col-md-2 control-label">Title</label>
                            <div class="col-md-8">
                                <input class="form-control" required="required" autofocus="autofocus" name="title" type="text" id="title"/>
                                @error('title')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                                @enderror
                                <span class="help-block">
                        <strong></strong>
                      </span>
                            </div>
                        </div>
{{--                                body--}}
                        <div class="form-group">
                            <label for="body" class="col-md-2 control-label">Body</label>

                            <div class="col-md-8">
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
{{--                        Categories List--}}
                        <div class="form-group">
                            <label for="category_id" class="col-md-2 control-label">Category</label>

                            <div class="col-md-8">
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
                            @error('category')
                            <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
{{--                            Tags List--}}
                        <div class="form-group">
                            <label for="tags" class="col-md-2 control-label">Tags</label>

                            <div class="col-md-8">
                                <select class="form-control" required="required" id="tag_id" name="tag_id[]"  multiple >
                                   @foreach($tags as $tag)
                                       <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                </select>
                                @error('tags')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                                @enderror
                                <span class="help-block">
                        <strong></strong>
                      </span>
                            </div>
                        </div>
{{--                        Published Status--}}
                        <div class="form-group">
                            <label for="published" class="col-md-2 control-label">Published</label>
                            <div class="col-md-8">
                                    <label class="col-sm-2 checkbox-inline">
                                        <input type="checkbox" name="Published">Yes</label>
                                @error('Published')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="published" class="col-md-2 control-label">Image Upload</label>
                            <div class="col-md-8">
                            <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                           Browse
                                            <input  id="imgInp" name="image" type="file"  class="form-control border-0" required>
                                        </span>
                                    </span>
                                <input type="text" class="form-control" readonly>
                            </div>
                            <img id='img-upload' />
                        </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
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







