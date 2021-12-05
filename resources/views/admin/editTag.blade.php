@extends('admin.master2')
@section('title')
    {{'Edit-Tag'}}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Edit Tag

                        <a href="/admin/tags" class="btn btn-default pull-right"
                        >Go Back</a
                        >
                    </h2>
                </div>

                <div class="panel-body">
                    <form method="POST" action="{{route('tags.update',$tag->id)}}" accept-charset="UTF-8" class="form-horizontal" role="form">
                        @method('PUT')
                        @csrf
                        @if (isset($errors) && count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="name" class="col-md-2 control-label">Name</label>

                            <div class="col-md-8">
                                <input class="form-control" required="required" autofocus="autofocus" name="name" type="text" id="name" value="{{$tag->name}}"/>

                                <span class="help-block">
                        <strong></strong>
                      </span>
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










