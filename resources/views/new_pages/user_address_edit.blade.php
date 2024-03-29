@extends('new_includes.new_main')

@section('title','My Account')



@section('content')
    <!-- START PAGE CONTENT -->
    <div class="content ">
        <!-- START JUMBOTRON -->
        
        <!-- END JUMBOTRON -->
        <!-- START CONTAINER FLUID -->
        <div class="container-fluid p-b-50 m-t-40">
            <div class="row">
                <div class="col-md-8">
                    <!-- START card -->
                    <div class="card card-borderless">
                        <ul class="nav nav-tabs nav-tabs-simple d-none d-md-flex d-lg-flex d-xl-flex"
                            role="tablist" data-init-reponsive-tabs="dropdownfx">
                            <li class="nav-item">
                                <a class="" data-toggle="tab" role="tab"
                                   data-target="#tab2hellowWorld" href="#" aria-selected="true">Account
                                    Info</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="tab" role="tab" data-target="#tab2FollowUs" class="active show"
                                   aria-selected="false">Saved Adress</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="tab" role="tab" data-target="#tab2Inspire" class=""
                                   aria-selected="false">Change Password</a>
                            </li>
                           {{-- <li class="nav-item">
                                <a href="#" data-toggle="tab" role="tab" data-target="#tab2Inspire" class=""
                                   aria-selected="false">Billing Setting</a>
                            </li>--}}
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane " id="tab2hellowWorld">
                                <div class="row column-seperation">
                                    <div class="col-lg-12">
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
                                        <form action="{{ action('UserDetailController@updateDetails',['id' => $user->id]) }}" method="POST" class="" id="form-account" role="form">
                                        {{ csrf_field() }}
                                        <!--<div class="form-group  form-group-default required">
                                                <label>Username</label>
                                                <input type="text" class="form-control"
                                                    placeholder="username@backpocket.ca" required="">
                                            </div>-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default required">
                                                        <label>First name</label>
                                                        <input class="form-control" type="text" name="first_name" id="dash_fname" value="{{$user->first_name}}" placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Last name</label>
                                                        <input class="form-control" type="text" name="last_name" id="dash_lname" value="{{$user->last_name}}" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default required">
                                                        <label>Email</label>
                                                        <input class="form-control" type="email" name="mail" value="{{$user->email}}" id="dash_email" required disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default required">
                                                        <label>Mobile Number</label>
                                                        <input class="form-control" type="text" name="phone" id="yourphone" value="{{$user->phone}}" placeholder="Phone Number" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default ">
                                                        <label>Instagram</label>
                                                        <input class="form-control" type="text" name="instagram" id="instagram" value="{{$user->instagram}}" placeholder="" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>FaceBook</label>
                                                        <input class="form-control" type="text" name="face_book" id="face_book" value="{{$user->face_book}}" placeholder="" >
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary btn-cons m-t-10" type="submit">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane active show" id="tab2FollowUs">
                                <div class="row column-seperation">
                                    <div class="col-lg-12">
                                        @if(Session::has('message1'))
                                            <div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                {{ Session::get('message1') }}
                                            </div>
                                        @endif
                                        <form class="" id="form-contact" role="form">
                                            {{csrf_field()}}
                                            <div class="col-lg-12 col-xl-12 col-xlg-5 p-b-5" style="border-color: black !important">
                                                <div class="widget-11-2 card no-border card-condensed no-margin widget-loader-circle full-height d-flex flex-column">
                                                    <div class="card-header  top-right">
                                                        <div class="card-controls">
                                                            <!-- <ul>
                                                                 <li><a data-toggle="refresh" class="card-refresh text-black" href="#"><i
                                                                         class="card-icon card-icon-refresh"></i></a>
                                                                 </li>
                                                             </ul>-->
                                                        </div>
                                                    </div>
                                                    <!--<div class="padding-25">
                                                       &lt;!&ndash; <div class="pull-left">
                                                            <h2 class="no-margin">My Orders</h2>
                                                            <p class="no-margin">Recent Transactions</p>
                                                        </div>&ndash;&gt;
                                                        &lt;!&ndash;<h3 class="pull-right semi-bold"><sup>
                                                                <small class="semi-bold">$</small>
                                                            </sup> 102,967
                                                        </h3>&ndash;&gt;
                                                        <div class="clearfix"></div>
                                                    </div>-->
                                                    <div class="auto-overflow">
                                                        <table class="table  table-hover " id="tableStore1">
                                                            <thead>
                                                            <tr class="text-center">
                                                                <th class="all-caps">Alias</th>
                                                                <th class="all-caps">Address</th>
                                                                <th class="all-caps"></th>
                                                                <!--<th class="all-caps"><font color="#fc7b03">Status</font></th>-->
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($multiple_address as $multi_address)
                                                                <tr class="text-center">
                                                                    <td class="fs-12">{{$multi_address->address_alias}}</td>
                                                                    <td class="fs-12">{{$multi_address->address}}</td>
                                                                    <td class="fs-12">

                                                                       
                                                                       

                                                                        <a href="{{ route('user.multiple-address-edit', ['id' => $multi_address->id]) }}" id="edit_multiaddress" class="bg-free-btn">Edit
                                                                        </a>
                                                                        @if($multi_address->address_alias !== 'Default')
                                                                        | 
                                                                        <a href="{{ route('user.multiple-address-remove', ['id' => $multi_address->id]) }}"
                                                                            id="remove_multiaddress"
                                                                            class="bg-free-btn">Delete
                                                                        </a>
                                                                        @endif
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--<div class="padding-25 mt-auto">
                                                        <p class="small pull-right">
                                                            <a href="#"><span>View Order History</span> <i
                                                                    class="fa fs-12 fa-arrow-circle-o-right text-success m-l-10"></i></a>
                                                        </p>
                                                    </div>-->
                                                </div>
                                            </div>
                                            <br>
                                            {{--<button id="btnStickUpSizeToggler" style="background-color: #6b00b3 !important; margin-left: 40%" class="btn btn-info btn-cons m-t-10" type="button">ADD
                                                ADDRESS</button>--}}
                                        </form>
                                    </div>
                                </div>
                                <div class="row column-seperation">
                                    <div class="auto-overflow col-lg-12">
                                        <form action="{{ action('UserDetailController@updateMultipleAddress',['id' => $edit_address->id]) }}" method="POST" class="" id="form-contact1" role="form">
                                            {{ csrf_field() }}

                                            <div class="col-lg-12 col-xl-12 col-xlg-5 p-b-5" style="border-color: black !important">
                                                <div class="">

                                                    <br>

                                                   
                                                    <div class=" widget-11-2-table">
                                                        <div class="row">
                                                            <div class="col-md-12">

                                                                <div class="form-group form-group-default">
                                                                 <label class="font-clr">ADD NEW ADDRESS</label>
                                                                    <input id="pac-input" type="text" value="{{$edit_address->address}}" class="form-control" required>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6" >
                                                                <div id="map" style="height: 360px;width: 100%"></div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                
                                                                <div class="form-group form-group-default">
                                                                <label class="font-clr">STREET</label>
                                                                    <input type="text" name="street" id="route" value="{{$edit_address->street}}" class="form-control" disabled="true">
                                                                </div>
                                                               
                                                                <div class="form-group form-group-default">
                                                                <label class="font-clr">CITY</label>
                                                                    <input name="city" id="locality" value="{{$edit_address->city}}" type="text" class="form-control" disabled="true">
                                                                </div>
                                                                
                                                                <div class="form-group form-group-default">
                                                                <label class="font-clr">PROVINCE</label>
                                                                    <input name="administrative_area_level_1" id="administrative_area_level_1" type="text" value="{{$edit_address->province}}" class="form-control" disabled="true">
                                                                </div>
                                                                
                                                                <div class="form-group form-group-default">
                                                                <label class="font-clr">POSTAL CODE</label>
                                                                    <input type="text" value="{{$edit_address->zip}}" name="zip" id="postal_code" class="form-control" disabled="true">
                                                                </div>
                                                                
                                                                <div class="form-group form-group-default">
                                                                <label class="font-clr">ADDRESS ALIAS</label>
                                                                    @if($edit_address->address_alias=="Default")
                                                                        <input disabled="" type="text" value="{{$edit_address->address_alias}}" name="address_alias" id="address_alias" class="form-control" required>
                                                                    @else
                                                                        <input type="text" value="{{$edit_address->address_alias}}" name="address_alias" id="address_alias" class="form-control" required>
                                                                    @endif
                                                                </div>
                                                              
                                                                <input type="hidden" name="latitude" id="latitude" value="{{$edit_address->latitude }}"/>
                                                                <input type="hidden" name="logtitude" id="longitude" value="{{$edit_address->longitude }}"/>
                                                              
                                                                <input class="field" value="" name="country" id="country" disabled="true" hidden/>
                                                                <input class="field" value="" name="street_number" id="street_number" disabled="true" hidden/>
                                                                <input type="hidden" value="" name="latitude" id="lat">
                                                                <input type="hidden" value="" name="longitude" id="lng">
                                                                <input type="hidden" value="" name="address" id="location">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <br>


                                                </div>
                                            </div>
                                         
                                            <div class="col-sm-12">
                                            <button  class="btn btn-primary btn-cons m-t-10" type="submit">UPDATE
                                                ADDRESS</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                            </div>
                            <div class="tab-pane" id="tab2Inspire">
                                <div class="row column-seperation">
                                    <div class="col-lg-12">
                                        @if(Session::has('error'))
                                            <div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                {{ Session::get('error') }}
                                            </div>
                                        @endif
                                        @if(Session::has('message'))
                                            <div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif
                                        <form action="{{ action('UserDetailController@passChange',['id' => $user->id]) }}" method="POST" class="" id="form-password" role="form">
                                            {{ csrf_field() }}
                                            <div class="form-group  form-group-default required">
                                                <label>Old Password</label>
                                                <input class="form-control" type="password" name="oldpass" id="old_password" required>
                                            </div>
                                            <div class="form-group  form-group-default required">
                                                <label>New Password</label>
                                                <input class="form-control" type="password" name="newpass" id="new_password" required>
                                            </div>
                                            <div class="form-group  form-group-default required">
                                                <label>Password Confirm</label>
                                                <input class="form-control" type="password" name="renewpass" id="change_password" required>
                                            </div>
                                            <button class="btn btn-primary btn-cons m-t-10" type="submit">Change
                                                Password</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END card -->
                    {{--------------------------------Address Modal---------------------------}}
                    {{--<div class="modal fade stick-up" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" >
                        <div class="modal-dialog modal-lg" style="width: 800px !important;">
                            <div class="modal-content">
                                <!--<div class="modal-header clearfix text-left">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                    </button>
                                    <h5>Payment <span class="semi-bold">Information</span></h5>
                                    <p>We need payment information inorder to process your order</p>
                                </div>-->
                                <div class="modal-body">
                                    <div class="row column-seperation">
                                        <div class="auto-overflow col-lg-12">
                                            <form class="" id="form-contact1" role="form">

                                                <div class="col-lg-12 col-xl-12 col-xlg-5 p-b-5" style="border-color: black !important">
                                                    <div class="">
                                                        <!-- <div class="card-header  top-right">
                                                             <div class="card-controls">
                                                                 &lt;!&ndash; <ul>
                                                                      <li><a data-toggle="refresh" class="card-refresh text-black" href="#"><i
                                                                              class="card-icon card-icon-refresh"></i></a>
                                                                      </li>
                                                                  </ul>&ndash;&gt;
                                                             </div>
                                                         </div><br><br>-->
                                                        <br>
                                                        <!--<div class="padding-25">
                                                           &lt;!&ndash; <div class="pull-left">
                                                                <h2 class="no-margin">My Orders</h2>
                                                                <p class="no-margin">Recent Transactions</p>
                                                            </div>&ndash;&gt;
                                                            &lt;!&ndash;<h3 class="pull-right semi-bold"><sup>
                                                                    <small class="semi-bold">$</small>
                                                                </sup> 102,967
                                                            </h3>&ndash;&gt;
                                                            <div class="clearfix"></div>
                                                        </div>-->
                                                        <label ><b>ADD NEW ADDRESS</b></label>
                                                        <div class=" widget-11-2-table">
                                                            <div class="row">
                                                                <div class="col-md-12">

                                                                    <div class="form-group form-group-default">
                                                                        <!--<label class="font-clr">ENTER ADDRESS HERE</label>-->
                                                                        <input id="pac-input"  type="text" class="form-control">
                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6" >
                                                                    <div id="map" style="height: 360px;width: 100%"></div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="font-clr">STREET</label>
                                                                    <div class="form-group form-group-default">
                                                                        <input type="text" nname="route" id="route" value="" class="form-control" disabled="true">
                                                                    </div>
                                                                    <label class="font-clr">CITY</label>
                                                                    <div class="form-group form-group-default">
                                                                        <input name="locality" id="locality" value="" type="text" class="form-control" disabled="true">
                                                                    </div>
                                                                    <label class="font-clr">PROVINCE</label>
                                                                    <div class="form-group form-group-default">
                                                                        <input name="administrative_area_level_1" id="administrative_area_level_1" type="text" value="" class="form-control" disabled="true">
                                                                    </div>
                                                                    <label class="font-clr">POSTAL CODE</label>
                                                                    <div class="form-group form-group-default">
                                                                        <input type="text" value="" name="postal_code" id="postal_code" class="form-control" disabled="true">
                                                                    </div>
                                                                    <label class="font-clr">ADDRESS ALIAS</label>
                                                                    <div class="form-group form-group-default">
                                                                        <input type="text" class="form-control">
                                                                    </div>

                                                                    <input class="field" value="" name="country" id="country" disabled="true" hidden/>
                                                                    <input class="field" value="" name="street_number" id="street_number" disabled="true" hidden/>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <br>


                                                    </div>
                                                </div>
                                                <br>
                                                <button style="background-color: #6b00b3 !important; margin-left: 40%" class="btn btn-info btn-cons m-t-10" type="button">ADD
                                                    ADDRESS</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>--}}
                    {{-------------------------------End-Address Modal---------------------------}}
                </div>
            </div>
        </div>
        <!-- END CONTAINER FLUID -->
    </div>

    <!-- END PAGE CONTENT -->
@endsection
@section('scripts')

    <script src="{{ URL::asset('new_assets/assets/plugins/jquery/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('new_assets/assets/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>

    <script src="{{ URL::asset('new_assets/assets/plugins/pace/pace.min.js')}}"  type="text/javascript"></script>
    <script src="{{ URL::asset('new_assets/assets/plugins/modernizr.custom.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('new_assets/assets/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('new_assets/assets/plugins/popper/umd/popper.min.js')}}" src="" type="text/javascript"></script>

    <script src="{{ URL::asset('new_assets/assets/plugins/jquery/jquery-easy.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('new_assets/assets/plugins/jquery-unveil/jquery.unveil.min.js')}}"  type="text/javascript"></script>
    <script src="{{ URL::asset('new_assets/assets/plugins/jquery-ios-list/jquery.ioslist.min.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('new_assets/assets/plugins/jquery-ios-list/jquery.ioslist.min.js')}}"></script>
    <script src="{{ URL::asset('new_assets/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{ URL::asset('new_assets/assets/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('new_assets/assets/plugins/classie/classie.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('new_assets/assets/plugins/switchery/js/switchery.min.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('new_assets/assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('new_assets/assets/plugins/jquery-inputmask/jquery.inputmask.min.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('new_assets/assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js')}}"  type="text/javascript"></script>
    <script src="{{ URL::asset('new_assets/assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('new_assets/assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('new_assets/assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('new_assets/assets/plugins/datatables-responsive/js/datatables.responsive.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset('new_assets/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>


    <script src="{{ URL::asset('new_assets/assets/js/datatables.js')}}" type="text/javascript"></script>

    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="{{ URL::asset('new_assets/pages/js/pages.js')}}"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{ URL::asset('new_assets/assets/js/scripts.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{ URL::asset('new_assets/assets/js/demo.js')}}" type="text/javascript"></script>


    <script src="{{ URL::asset('assets/js/jquery.maskedinput.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRu_qlT0HNjPcs45NXXiOSMd3btAUduSc&libraries=places&callback=initMap" async defer></script>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
<script src="{{ URL::asset('assets2/js/user_address_edit.js') }}"></script>
@endsection