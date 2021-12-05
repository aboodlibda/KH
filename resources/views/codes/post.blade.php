@extends('codes.master')

@section('title')
    {{'Post'}}
@endsection

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$post->title}}&nbsp; &nbsp;<small>by  {{$post->author}}</small>

                    <span class="pull-right">
                           {{$post->created_at->diffForHumans()}}
                        </span>
                </div>

                <div class="panel-body">
                    <p>{{$post->body}}</p>
                    <p>
                        Category: <span class="label label-success">{{$post->category->name}}</span> <br>
                        Tags:
                        @foreach($post->tags as $tag)
                            <span class="label label-danger">{{$tag->name}}</span>
                        @endforeach
                    </p>
                </div>
            </div>
            @foreach($post->comments as $comment)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Favian Halvorson says...

                    <span class="pull-right">{{$comment->created_at->diffForHumans()}}</span>
                </div>

                <div class="panel-body">
                    <p>{{$comment->content}}</p>
                </div>
            </div>
            @endforeach


            <form action="{{route('saveComment',$post->id)}}" method="POST">
                @csrf
                @method('post')
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="5" id="content" name="content"></textarea>
                    <button  class="btn btn-success">comment</button>
                </div>
            </form>

        </div>



    </div>
@endsection
