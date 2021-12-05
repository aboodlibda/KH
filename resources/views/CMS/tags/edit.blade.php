@extends('CMS.parent')

@section('title')
    {{'Edit Category'}}
@endsection


@section('content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h1>Users</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('tags.index')}}">Tags</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Tag</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#editUser">Edit Tag</a></li>
                </ul>
                <div class="tab-content mt-0">
                    {{--Adding imageUsers Form--}}
                    <div class="tab-pane show active" id="editUser">
                        <div class="body mt-2">
                            <form action="{{route('tags.update',$tag->id)}}" method="post">
                                @csrf
                                {{method_field('put')}}
                                <div class="row clearfix">

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="name"> Name </label>
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$tag->name}}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
