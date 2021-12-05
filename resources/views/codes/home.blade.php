@extends('codes.master')
@section('title')
    {{'Home'}}
@endsection

@section('content')

    <div class="row form-search">
        <form method="GET" action="" accept-charset="UTF-8" role="form">
            <div class="col-md-10">
                <input class="form-control" placeholder="Search..." name="search" type="text">
            </div>
            <div class="col-md-2">
                <input class="btn btn-block btn-default" type="submit" value="Sumbit">
            </div>
        </form>
    </div>

    <div class="row">

        <div class="col-md-12">
            @foreach($posts as $post)
            <div class="panel panel-default">
                <div class="panel-heading">
                 <h3> {{$post->title}}</h3> <small><span class="btn btn-sm btn-primary">by {{$post->author}}</span></small>

                    <span class="pull-right">

                        {{$post->created_at->diffForHumans()}}
                        </span>
                </div>

                <div class="panel-body">
                    <p>{{$post->body}}</p>
                    <p>
                        Tags:
                        @foreach($post->tags as $tag)
                            <span class="label label-danger">{{$tag->name}}</span>
                        @endforeach
                    </p>
                    <p>
{{--                        <span class="btn btn-sm btn-success">ipsum</span>--}}
{{--                        <span class="btn btn-sm btn-info">Comments <span class="badge"></span></span>--}}

                        <a href="{{route('home.show',$post->id)}}" class="btn btn-sm btn-success">See more</a>
                    </p>
                </div>
            </div>
            @endforeach

          {{$posts}}

        </div>



    </div>


@endsection
