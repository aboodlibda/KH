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
                        Posts

                        <a href="{{route('posts.create')}}" class="btn btn-default pull-right">Create New</a>
                    </h2>
                </div>

                <div class="panel-body">
                    @if(session()->has('createdPost'))
                        <div class="alert alert-success">
                            <strong>{{ session()->get('createdPost') }}</strong>
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Image</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $key => $post)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$post->title}}</td>
                            <td>
                             {{  substr($post->body, 0, 50)}}{{strlen($post->body) > 50 ? '...' : ''}}
                            </td>
                            <td>
                                <img src="{{asset('postsImages/'.$post->image)}}"  class="img-fluid thumbnail" style="height: 70px; width: 250px" >
                            </td>
                            <td>
                                <span class="btn btn-xs btn-success">{{$post->user->name}}</span>
                            </td>
                            <td>
                                <a href="{{route('categories.index')}}" class="btn btn-xs btn-primary">
                                    {{$post->category->name}}
                                </a>
                            </td>
                            <td>
{{--                                    {{$post->tags->implode('name')}}--}}
                                    @foreach($post->tags as $tag)
                                    <a href="{{route('tags.index')}}" class="btn btn-xs btn-info">{{$tag->name}}</a><br>
                                    @endforeach
                            </td>

                            <td>
                                @if($post->status == 'Published')
                                    <span class="btn btn-xs btn-success">{{($post->status)}}</span>
                                @else
                                <span class="btn btn-xs btn-danger">{{($post->status)}}</span>
                                @endif
                            </td>
                            <td >
                                <a href="{{route('publish',$post->id)}}" class="btn btn-xs{{$post->status == 'Published' ? " btn-warning" : " btn-success"}} ">{{$post->status == 'Published' ?'unPublished' : 'publish'}}</a>
                                <a href="{{route('posts.show',$post->id)}}" class="btn btn-xs btn-secondary">Show</a>
                                <a href="{{route('posts.edit',$post->id)}}" class="btn btn-xs btn-info">Edit</a>
                                <form method="POST" action="{{ route('posts.destroy',$post->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger">
                                        <i data-feather="delete">Delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                 {{$posts->links()}}
@endsection









