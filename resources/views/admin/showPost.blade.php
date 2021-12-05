@extends('admin.master2')
@section('title')
    {{'Posts'}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        {{$post->title}}
                        <small>by  {{$post->author}}</small>

                        <a href="/admin/posts" class="btn btn-default pull-right"
                        >Go Back</a
                        >
                    </h2>
                </div>

                <div class="panel-body">
                    <p>
                        {{$post->body}}
                    </p>

                    <p><strong>Category: </strong>{{$post->category->name}}</p>
                    <p><strong>Tags: </strong>{{$post->tags->implode('name')}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

