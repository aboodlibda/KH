@extends('CMS.parent')

@section('title')
    {{'Transactions'}}
@endsection

@section('content')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h1>Complaints</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Complaints</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Menus">Transactions</a></li>
                </ul>
<br>

                <div class="tab-content mt-0">

                    <div class="tab-pane show active" id="Menus">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>phone</th>
                                    <th>description</th>
                                    <th>created at</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($complaints as $key => $complaint)
                                    <tr>
                                        <td>
                                            {{$key+1}}
                                        </td>
                                        <td>{{$complaint->name}}</td>
                                        <td>{{$complaint->phone}}</td>
                                        <td>{{ Str::limit($complaint->description ,50)}}</td>
                                        <td>{{$complaint->created_at->toFormattedDateString()}}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- delete -->



@endsection

@section('scripts')
    <script src="{{asset('assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>
    <script src="{{asset('Dashboard/assets/vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/modal.js')}}"></script>
    <script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script>

    @include('partials._scripts')

    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var title = button.data('title')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #title').val(title);
        })
    </script>

@endsection

