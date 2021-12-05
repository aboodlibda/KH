@extends('admin.master2')
@section('title')
    {{'Comments'}}
@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Comments

                        <a href="" class="btn btn-default pull-right">Create New</a>
                    </h2>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $key => $comment)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$comment->content}}</td>
                            <td>
                                <a href="" data-method="DELETE" data-token="32Mxrb2s2QPyv3C1h4iYcbfZBT7PmU7Tfm9koxkk"
                                   data-confirm="Are you sure?" class="btn btn-xs btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{$comments->links()}}



                </div>
            </div>
        </div>

    </div>
@endsection
