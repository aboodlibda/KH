@extends('admin.master2')
@section('title')
    {{'Create-Category'}}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Create Category

                        <a href="/admin/categories" class="btn btn-default pull-right"
                        >Go Back</a
                        >
                    </h2>
                </div>

                <div class="panel-body">
                    <form method="POST" action="{{route('categories.store')}}" accept-charset="UTF-8" class="form-horizontal" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-md-2 control-label"
                            >Name</label
                            >

                            <div class="col-md-8">
                                @error('name')
                                   <span class="text-danger">{{$message}}</span>
                                @enderror
                                <input class="form-control" required="required"  autofocus="autofocus" name="name" type="text" id="name" value="{{old('name')}}"/>
                                <span class="help-block">
                        <strong></strong>
                      </span>
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




