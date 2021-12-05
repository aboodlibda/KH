@extends('admin.master2')
@section('title')
    {{'Category-Edit'}}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Edit Category

                        <a
                            href="http://127.0.0.1:8000/admin/categories"
                            class="btn btn-default pull-right"
                        >Go Back</a
                        >
                    </h2>
                </div>

                <div class="panel-body">
                    <form method="POST" action="{{route('categories.update',$category->id)}}" accept-charset="UTF-8" class="form-horizontal" role="form">
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
                        @method('PUT')
{{--                        <input name="_method" type="hidden" value="PUT" />--}}
{{--                        <input name="_token" type="hidden" value="FwwAVH9WQfgJIiexn4w4i5l2TWSs4UZsYXDntHCq" />--}}

                        <div class="form-group">
                            <label for="name" class="col-md-2 control-label">Name</label>

                            <div class="col-md-8">
                                <input class="form-control" required="required" autofocus="autofocus" name="name" type="text" value="{{old('name', $category->name)}}"
                                       id="name"/>

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


