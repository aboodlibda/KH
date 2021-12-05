@extends('admin.master2')
@section('title')
    {{'Tags'}}
@endsection

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Tags

                        <a href="{{route('tags.create')}}" class="btn btn-default pull-right">Create New</a>
                    </h2>
                </div>

                <div class="panel-body">
                    @if(session()->has('createdMessage'))
                        <div class="alert alert-success">
                            {{ session()->get('createdMessage') }}
                        </div>
                    @endif

                    @if(session()->has('updatedMessage'))
                        <div class="alert alert-success">
                            {{ session()->get('updatedMessage') }}
                        </div>
                    @endif

                    @if(session()->has('deletedMessage'))
                        <div class="alert alert-danger">
                            {{ session()->get('deletedMessage') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Posts Count</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $key => $tag)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$tag->name}}</td>
                            <td>
                                <a href="{{route('posts.index')}}">
                                    <span class="btn btn-danger">
                                       {{$tag->posts->count()}}
                                    </span>
                                </a>
                            </td>
                            <td>
                                <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-xs btn-info">Edit</a>
                                <form method="POST" action="{{ route('tags.destroy',$tag->id) }}" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-xs btn-danger">
                                        <i data-feather="delete">Delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                        {{$tags->links()}}




                </div>
            </div>
        </div>

    </div>
@endsection





