@extends('admin.master2')
@section('title')
    {{'Categories'}}
@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Categories

                        <a href="{{route('categories.create')}}" class="btn btn-default pull-right">Create New</a>
                    </h2>
                </div>

                <div class="panel-body">
                    @if(session()->has('createdMessage'))
                        <div class="alert alert-success">
                            <strong>{{ session()->get('createdMessage') }}</strong>
                        </div>
                    @endif

                        @if(session()->has('updatedMessage'))
                            <div class="alert alert-success">
                                <strong>{{ session()->get('updatedMessage') }}</strong>
                            </div>
                        @endif

                        @if(session()->has('deletedMessage'))
                            <div class="alert alert-danger">
                                <strong>{{ session()->get('deletedMessage') }}</strong>
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
                        @foreach($categories as $key => $category)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                <a href="{{route('posts.index')}}">
                                <span class="btn btn-danger"> {{$category->posts->count()}}</span>
                                </a>
                            </td>
                            <td>
                                <a href="{{route('categories.edit',$category->id)}}" class="btn btn-xs btn-info">Edit</a>
                                <form method="POST" action="{{ route('categories.destroy',$category->id) }}" style="display: inline">
                                    @csrf
                                    @method('DELETE')
{{--                                    <input type="hidden" name="_method" value="DELETE">--}}
                                    <button type="submit" class="btn btn-xs btn-danger">
                                        <i data-feather="delete">Delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}



                </div>
            </div>
        </div>

    </div>
@endsection
