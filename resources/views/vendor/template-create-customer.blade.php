@extends('vendor.includes.master-vendor')

@section('content')

    <link href="{{ URL::asset('assets/map/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/map/css/custom.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/map/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/map/css/bootstrap-4-utilities.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('assets2/css/vendor/template-create-customer.css') }}" >
    <script src="{{ URL::asset('assets/map/js/jquery1.11.3.min.js')}}"></script>
    <script src="{{ URL::asset('assets/map/js/jquery.blockUI.js')}}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="page-title row">
        <h2>Create Template</h2>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2 left-table">
                <div class="bg-white row">
                    <div class="col-md-12 col-lg-12 col-sm-12">


                        <!-- form starting -->
                        <form action="/vendor/order-template" method="POST">
                        {{csrf_field()}}
                            <input name="client_id" type="hidden" value="{{$id}}" />
                            <input name="vendor_id" type="hidden" value="{{$vendor_id}}" />

                    <div class="address-form-block col-md-12 col-sm-12 col-xs-12 mt-2 ">
                        <h3>Template Details</h3>
                        <br>
                        <br>
                        <br>

                        <div class="row">
                            <div class="col-xs-12 mt-2">
                                <label for="CustomerTemplate" class="control-label col-sm-3">Template Name *</label>
                                <div class="col-sm-4">
                                    <input class="w-100" type="text" name="name" id="name" placeholder="Name">
                                    @if($errors->has('name'))
                                        <div class="error text-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <br>

                            <div class="col-xs-12 mt-2">
                                <label class="control-label col-sm-3" for="unit">Name for SAMS</label>
                                <div class="col-sm-4">
                                    <input class="w-100" type="text" name="name_for_sams" id="name_for_sams"
                                           placeholder="Name for SAMS">
                                </div>
                            </div>
                            <br>
                            <br>

                            <div class="col-xs-12 mt-2">
                                <label class="control-label col-sm-3" for="unit">Account Manager</label>
                                <div class="col-sm-4">
                                    <select class="w-100" type="text" name="manager_id" id="manager_id" placeholder="Manager ID">
                                        <option value="">Select Account Manager</option>
                                        @foreach($accountManagers as $name )
                                            <option value="{{$name->UID}}">{{ $name->FULL_NAME }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <br>


                            <div class="col-xs-12 mt-2">
                                <label class="control-label col-sm-3" for="unit">Job type ID * </label>
                                <div class="col-sm-4">
                                    <select class="w-100" type="text" name="job_type_id" id="job_type_id" placeholder="Job type ID">
                                        <option value="">Select Job type ID</option>

                                        @foreach($job_type as $type )
                                            @php
                                                $job_id=30;
                                                if(isset($orderTemplate->job_type_id))
                                                {
                                                   $job_id=$orderTemplate->job_type_id;
                                                }
                                            @endphp
                                            <option value="{{$type->UID}}" <?php if($type->UID==30) {?>selected<?php }?>>{{ $type->TYPE_NAME }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <br>


                            <div class="col-xs-12 mt-2">
                                <label class="control-label col-sm-3" for="province">Repeat * </label>
                                <div class="col-sm-7  mt-2">
                                    <span class="element">
                                        <input type="radio" name="repeat" id="repeat_pattern_1" value="Daily">&nbsp;Daily&nbsp;
                                        <input type="radio" name="repeat" id="repeat_pattern_2" value="Weekly">&nbsp;Weekly&nbsp;
                                        <input type="radio" name="repeat" id="repeat_pattern_3" value="Monthly">&nbsp;Monthly&nbsp;
                                        <input type="radio" name="repeat" id="repeat_pattern_4" value="Quarterly">&nbsp;Qarterly&nbsp;
                                        <input type="radio" name="repeat" id="repeat_pattern_5" value="Semi-Annual">&nbsp;Semi-Annual&nbsp;
                                        <input type="radio" name="repeat" id="repeat_pattern_6" value="Yearly">&nbsp;Yearly&nbsp;
                                        <input type="radio" name="repeat" id="repeat_pattern_7" value="On-Call" checked="checked">&nbsp;On Call
                                    </span>
                                        <script src="{{ URL::asset('assets2/js/template-create-customer.js')}} }}"></script>
                                    <div class="aparts" id="days_apart_div" style="display: none;"><label>Every</label>
                                        <span class="element">
                                            <input id="days_apart" name="days_apart" type="TEXT" maxlength="3" size="4" value="1" title="Number of days after which this job should be repeated, only for daily pattern">
                                         <strong>days</strong>
                                        </span>
                                    </div>
                                    <div class="aparts" id="weeks_apart_div" style="display: none;">
                                        <label>Every</label>
                                        <span class="element">
                                            <input id="weeks_apart" name="weeks_apart" type="TEXT" maxlength="3" size="4" value="1" title="Number of weeks before this job is repeated, only for weekly pattern">
                                         <strong>weeks</strong>
                                        </span>
                                    </div>
                                    <div class="aparts" id="months_apart_div" style="display: none;">
                                        <label>Every</label>
                                        <span class="element">
                                            <input id="months_apart" name="months_apart" type="TEXT" maxlength="3" size="4" value="1" title="Number of monthd to pass for this job to be repeated, only for monhtlhy pattern">
                                            <strong>months</strong>
                                        </span>
                                    </div>
                                    @if($errors->has('repeat'))
                                        <div class="error text-danger">{{ $errors->first('repeat') }}</div>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <br>


                            <div class="col-xs-12 mt-2">
                                <label class="control-label col-sm-3" for="province">Days Allowed * </label>
                                <div class="col-sm-4">
                                    <select  placeholder="Please Select" class="form-control custom-select" multiple
                                            id="days_allowed">
                                        <option value="1">Monday</option>
                                        <option value="2">Tuesday</option>
                                        <option value="3">Wednesday</option>
                                        <option value="4">Thursday</option>
                                        <option value="5">Friday</option>
                                        <option value="6">Saturday</option>
                                        <option value="7">Sunday</option>
                                    </select>
                                    @if($errors->has('days_allowed'))
                                        <div class="error text-danger">{{ $errors->first('days_allowed') }}</div>
                                    @endif
                                </div>
                            </div>

                            <br>
                            <br>


                            <div class="col-xs-12 mt-2">
                                <label class="control-label col-sm-3" for="unit">Start Date *</label>
                                <div class="col-sm-4">
                                    <input class="w-100" type="date" name="schedule_from" id="schedule_from">
                                    @if($errors->has('schedule_from'))
                                        <div class="error text-danger">{{ $errors->first('schedule_from') }}</div>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>

                            <div class="col-xs-12 mt-2">
                                <label class="control-label col-sm-3" for="unit">Service Time</label>
                                <div class="col-sm-4">
                                    <input class="w-100" name="avg_service_time" id="avg_service_time">
                                    @if($errors->has('avg_service_time'))
                                        <div class="error text-danger">{{ $errors->first('avg_service_time') }}</div>
                                    @endif
                                </div>
                            </div>

                            <br>
                            <br>
                            <div class="col-xs-12 mt-2">
                                <label class="control-label col-sm-3" for="province">Is Active*</label>
                                <div class="col-sm-4">
                                    <select name="is_active" class="form-control" id="is_active">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="col-xs-12 mt-2">
                                <label class="control-label col-sm-3" for="province">Special Notes</label>
                                <div class="col-sm-4">
                                    <textarea name="special_notes" rows="4" cols="45" placeholder="Enter Note Here"></textarea>
                                </div>
                            </div>

                            <div class="col-xs-12 mt-2">
                                <label class="control-label col-sm-3" for="province">Payment Method</label>
                                <div class="col-sm-4">
                                    <select name="payment_method" class="form-control" id="payment_method">
                                        <option value="Credit Card" selected="selected">Credit Card</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Credits">Credits</option>
                                        <option value="Debit">Debit</option>
                                        <option value="EFT">EFT</option>
                                    </select>
                                    <h6> * Requred fields</h6>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="text-right col-xs-12 mt-2">
                                <div class="actions col-xs-7">
                                    <button type="submit" data-next="step2" id="btnCreateClient"
                                            class="btn btn-success btn-next">Create<i class="icon-arrow-right"></i>
                                    </button>


                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <!------>


                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 50,
                ajax: '/vendor/get-template-ajax',
                columns: [{
                    data: 'id',
                    name: 'id'
                },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'job_type_id',
                        name: 'job_type_id'
                    },
                    {
                        data: 'repeat',
                        name: 'repeat'
                    },
                    {
                        data: 'schedule_from',
                        name: 'schedule_from'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false
                    }
                ]
            });
        });
    </script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
@stop

@section('footer')

@stop
