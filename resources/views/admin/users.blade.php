@extends('admin.master2')
@section('title')
    {{'Users'}}
@endsection

@section('content')


    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Users
                    </h2>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                    <img src="{{asset('usersImages/'.$user->image)}}"  class="img-fluid rounded thumbnail" style="height: 100px; width: 100px" >
                            </td>
                            <td>
                                <a href="" data-method="DELETE" data-token="32Mxrb2s2QPyv3C1h4iYcbfZBT7PmU7Tfm9koxkk"
                                   data-confirm="Are you sure?" class="btn btn-xs btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>



                </div>
            </div>
        </div>

    </div>
@endsection








