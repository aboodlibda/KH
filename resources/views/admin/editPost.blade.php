@extends('admin.master2')
@section('title')
    {{'Post-Edit'}}
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
                        Edit Post

                        <a href="/admin/posts" class="btn btn-default pull-right"
                        >Go Back</a
                        >
                    </h2>
                </div>

                <div class="panel-body">
                    <form method="POST" action="{{route('posts.update',$post->id)}}" accept-charset="UTF-8" class="form-horizontal" role="form">
                    @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title" class="col-md-2 control-label">Title</label>

                            <div class="col-md-8">
                                <input class="form-control" required="required" autofocus="autofocus" name="title" type="text" value="{{$post->title}}" id="title"/>

                                <span class="help-block">
                        <strong></strong>
                      </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="body" class="col-md-2 control-label">Body</label>

                            <div class="col-md-8">
                      <textarea class="form-control" required="required" name="body" cols="50" rows="10" id="body">
                          {!! $post->body !!}
                      </textarea>

                                <span class="help-block">
                        <strong></strong>
                      </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category" class="col-md-2 control-label">Category</label>

                            <div class="col-md-8">
                                <select class="form-control" required="required" id="category_id" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>

                                <span class="help-block">
                        <strong></strong>
                      </span>
                            </div>
                        </div>

                                  {{--Tags List--}}
                        <div class="form-group">
                            <label for="tags" class="col-md-2 control-label">Tags</label>

                            <div class="col-md-8">
                                <select class="form-control" required="required" id="tag_id[]" name="tag_id[]" multiple>
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}"
                                        @foreach($post->tags as $item)
                                            {{$tag->id == $item->id ? 'selected':''}}
                                        @endforeach
                                            >{{$tag->name}}</option>

                                    @endforeach

                                </select>
                                <span class="help-block">
                        <strong></strong>
                      </span>
                            </div>
                        </div>
                        {{--                        Published Status--}}
                        <div class="form-group">
                            <label for="published" class="col-md-2 control-label">Published</label>

                            <div class="col-md-8">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="Published" id="flexSwitchCheckChecked"
                                           {{$post->status == 'Published' ? 'checked' : ''}}>
                                </div>
                                <span class="help-block">
                        <strong></strong>
                      </span>
                            </div>
                        </div>

                        <div class="form-group">
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

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    Update
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






