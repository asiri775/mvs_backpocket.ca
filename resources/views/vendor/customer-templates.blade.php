@extends('vendor.includes.master-vendor')

@section('content')
    <link href="{{ URL::asset('assets/map/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/map/css/custom.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/map/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/map/css/bootstrap-4-utilities.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<link type="text/css" rel="stylesheet" href="{{ URL::asset('assets2/css/vendor/customer-templates.css') }}"
    <script src="{{ URL::asset('assets/map/js/jquery1.11.3.min.js')}}"></script>
    <script src="{{ URL::asset('assets/map/js/jquery.blockUI.js')}}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="page-title row">
        <h2>Customer: {{$client->first_name." ".$client->last_name}}</h2>
    </div>
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('message') }}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('error') }}
        </div>
    @endif

    <div class="container row">
        <div class="row main-row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left-table">
                <div class="bg-white row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div id="exTab2" class="col-12">
                            <ul class="nav nav-tabs">
                                <li><a href="{{url('/vendor/customer/'.$client->id)}}">Overview</a></li>
                                <li class="active"><a href="{{url('/vendor/customer/'.$client->id.'/templates')}}" >Templates</a></li>
                                <li><a href="{{url('/vendor/customer/'.$client->id.'/orders')}}?orderId=&quickdate=&fromTime=&toTime=&status=&method=&type=&orderForm=Search" >Repeat Orders</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane  mt-3" id="1">
                                </div>
                                <div class="tab-pane active mt-3" id="2">
                                    <div class="panel-body-custom tableContainParent panel col-md-12 col-lg-12 col-sm-12 left-tab">
                                        <div class="table-responsive">
                                            <a href="{{ url('vendor/template/') }}/{{$client->id}}/create"
                                               class="btn btn-info addTemplateButton my-2"><i
                                                        class="glyphicon glyphicon-plus-sign"></i> Add New Template</a>
                                            <div id="example_wrapper" class="dataTables_wrapper no-footer">
                                                <table class="table table-bordered w-100" id="users-table">
                                                    <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Name</th>
                                                        <th>Job Type</th>
                                                        <th>Repeat</th>
                                                        <th>Schedule From</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane mt-3" id="3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('assets2/js/customer-templates.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script src="http://cdn.datatables.net/plug-ins/1.10.15/dataRender/datetime.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

@stop

@section('footer')

@stop