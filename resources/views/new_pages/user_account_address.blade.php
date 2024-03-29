@extends('new_includes.new_main')

@section('title','My Account')

@section('content')
<!-- START PAGE CONTENT -->
<div class="content ">
    <!-- START JUMBOTRON -->

    <!-- END JUMBOTRON -->
    <!-- START CONTAINER FLUID -->
    <div class=" container-fluid  p-b-50 m-t-40">
        <div class="row">
            <div class="col-md-8">
                <!-- START card -->
                <div class="card card-borderless">
                    <ul class="nav nav-tabs nav-tabs-simple d-none d-md-flex d-lg-flex d-xl-flex" role="tablist"
                        data-init-reponsive-tabs="dropdownfx">
                        @if(Session::get('tab')=="account_info")
                        <li class="nav-item">
                            <a class="active show" data-toggle="tab" role="tab" data-target="#tab2hellowWorld" href="#"
                                aria-selected="true">ACCOUNT</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a data-toggle="tab" role="tab" data-target="#tab2hellowWorld" href="#"
                                aria-selected="true">ACCOUNT</a>
                        </li>
                        @endif

                        @if(Session::get('tab')=="saved_address")
                        <li class="nav-item">
                            <a href="#" class="active show" data-toggle="tab" role="tab" data-target="#tab2FollowUs"
                                class="" aria-selected="false">ADDRESS</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a href="#" data-toggle="tab" role="tab" data-target="#tab2FollowUs" class=""
                                aria-selected="false">ADDRESS</a>
                        </li>
                        @endif
                        @if(Session::get('tab')=="change_pass")
                        <li class="nav-item">
                            <a href="#" class="active show" data-toggle="tab" role="tab" data-target="#tab2Inspire"
                                class="" aria-selected="false">PASSWORD</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a href="#" data-toggle="tab" role="tab" data-target="#tab2Inspire" class=""
                                aria-selected="false">PASSWORD</a>
                        </li>
                        @endif


                        {{-- <li class="nav-item">
                                <a href="#" data-toggle="tab" role="tab" data-target="#tab2Inspire" class=""
                                   aria-selected="false">Billing Setting</a>
                            </li> --}}
                    </ul>
                    <div class="tab-content">
                        @if(Session::get('tab')=="account_info")
                        <div class="tab-pane active show" id="tab2hellowWorld">
                            @else
                            <div class="tab-pane" id="tab2hellowWorld">
                                @endif

                                <div class="row column-seperation">
                                    <div class="col-lg-12">
                                        @if(Session::has('message'))
                                        <div class="alert alert-success alert-dismissable">
                                            <a href="#" class="close" data-dismiss="alert"
                                                aria-label="close">&times;</a>
                                            {{ Session::get('message') }}
                                        </div>
                                        @endif
                                        @if(Session::has('error'))
                                        <div class="alert alert-danger alert-dismissable">
                                            <a href="#" class="close" data-dismiss="alert"
                                                aria-label="close">&times;</a>
                                            {{ Session::get('error') }}
                                        </div>
                                        @endif
                                        <form
                                            action="{{ action('UserDetailController@updateDetails',['id' => $user->id]) }}"
                                            method="POST" class="" id="form-account" role="form">
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
                                                        <input class="form-control" type="text" name="first_name"
                                                            id="dash_fname" value="{{$user->first_name}}" placeholder=""
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Last name</label>
                                                        <input class="form-control" type="text" name="last_name"
                                                            id="dash_lname" value="{{$user->last_name}}" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default required">
                                                        <label>Email</label>
                                                        <input class="form-control" type="email" name="mail"
                                                            value="{{$user->email}}" id="dash_email" required disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default required">
                                                        <label>Mobile Number</label>
                                                        <input class="form-control" type="text" name="phone"
                                                            id="yourphone" value="{{$user->phone}}"
                                                            placeholder="Phone Number" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default ">
                                                        <label>Instagram</label>
                                                        <input class="form-control" type="text" name="instagram"
                                                            id="instagram" value="{{$user->instagram}}" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>FaceBook</label>
                                                        <input class="form-control" type="text" name="face_book"
                                                            id="face_book" value="{{$user->face_book}}" placeholder="">
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary btn-cons m-t-10" type="submit">Save
                                                Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @if(Session::get('tab')=="saved_address")
                            <div class="tab-pane active show" id="tab2FollowUs">
                                @else
                                <div class="tab-pane" id="tab2FollowUs">
                                    @endif
                                    <div class="row column-seperation">
                                        <div class="col-lg-12">
                                            @if(Session::has('message1'))
                                            <div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert"
                                                    aria-label="close">&times;</a>
                                                {{ Session::get('message1') }}
                                            </div>
                                            @endif
                                            <form class="" id="form-contact" role="form">
                                                {{csrf_field()}}
                                                <div class="col-lg-12 col-xl-12 col-xlg-5 p-b-5"
                                                    style="border-color: black !important">
                                                    <div
                                                        class="widget-11-2 card no-border card-condensed no-margin widget-loader-circle full-height d-flex flex-column">
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
                                                                        <td class="fs-12">
                                                                            {{$multi_address->address_alias}}</td>
                                                                        <td class="fs-12"><a href="#"
                                                                                class="user-ac-adress">{{$multi_address->address}}</a>
                                                                        </td>
                                                                        <td class="fs-12">


                                                                            <a href="{{ route('user.multiple-address-edit', ['id' => $multi_address->id]) }}"
                                                                                id="edit_multiaddress"
                                                                                class="bg-free-btn">Edit
                                                                            </a>
                                                                            @if($multi_address->address_alias !==
                                                                            'Default')
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
                                            <form
                                                action="{{ action('UserDetailController@addMultipleAddress',['id' => $user->id]) }}"
                                                method="POST" class="" id="form-contact1" role="form">
                                                {{ csrf_field() }}

                                                <div class="col-lg-12 col-xl-12 col-xlg-5 p-b-5"
                                                    style="border-color: black !important">
                                                    <div class="">

                                                        <br>


                                                        <div>
                                                            <div class="row">
                                                                <div class="col-sm-12">

                                                                    <div class="form-group form-group-default">
                                                                        <label>ADD NEW ADDRESS</label>
                                                                        <!--<label class="font-clr">ENTER ADDRESS HERE</label>-->
                                                                        <input id="pac-input" type="text"
                                                                            class="form-control" required>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div id="map">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">

                                                                    <div class="form-group form-group-default">
                                                                        <label>STREET</label>
                                                                        <input type="text" name="street" id="route"
                                                                            value="" class="form-control"
                                                                            disabled="true">
                                                                    </div>

                                                                    <div class="form-group form-group-default">
                                                                        <label>CITY</label>
                                                                        <input name="city" id="locality" value=""
                                                                            type="text" class="form-control"
                                                                            disabled="true">
                                                                    </div>

                                                                    <div class="form-group form-group-default">
                                                                        <label>PROVINCE</label>
                                                                        <input name="province"
                                                                            id="administrative_area_level_1" type="text"
                                                                            value="" class="form-control"
                                                                            disabled="true">
                                                                    </div>

                                                                    <div class="form-group form-group-default">
                                                                        <label>POSTAL CODE</label>
                                                                        <input type="text" value="" name="zip"
                                                                            id="postal_code" class="form-control"
                                                                            disabled="true">
                                                                    </div>

                                                                    <div class="form-group form-group-default">
                                                                        <label>ADDRESS ALIAS</label>
                                                                        <input type="text" value="" name="address_alias"
                                                                            id="address_alias" class="form-control"
                                                                            required>
                                                                    </div>

                                                                    <input class="field" value="" name="country"
                                                                        id="country" disabled="true" hidden />
                                                                    <input class="field" value="" name="street_number"
                                                                        id="street_number" disabled="true" hidden />
                                                                    <input type="hidden" value="" name="latitude"
                                                                        id="lat">
                                                                    <input type="hidden" value="" name="longitude"
                                                                        id="lng">
                                                                    <input type="hidden" value="" name="address"
                                                                        id="location">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <br>


                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-12">
                                                    <button class="btn btn-primary  m-t-10" type="submit">ADD
                                                        ADDRESS</button>
                                                    <button class="btn btn-secondary m-t-10"
                                                        type="reset">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>


                                </div>
                                @if(Session::get('tab')=="change_pass")
                                <div class="tab-pane active show" id="tab2Inspire">
                                    @else
                                    <div class="tab-pane" id="tab2Inspire">
                                        @endif

                                        <div class="row column-seperation">
                                            <div class="col-lg-12">
                                                @if(Session::has('error'))
                                                <div class="alert alert-danger alert-dismissable">
                                                    <a href="#" class="close" data-dismiss="alert"
                                                        aria-label="close">&times;</a>
                                                    {{ Session::get('error') }}
                                                </div>
                                                @endif
                                                @if(Session::has('message'))
                                                <div class="alert alert-success alert-dismissable">
                                                    <a href="#" class="close" data-dismiss="alert"
                                                        aria-label="close">&times;</a>
                                                    {{ Session::get('message') }}
                                                </div>
                                                @endif
                                                <form
                                                    action="{{ action('UserDetailController@passChange',['id' => $user->id]) }}"
                                                    method="POST" class="" id="form-password" role="form">
                                                    {{ csrf_field() }}
                                                    <div class="form-group  form-group-default required">
                                                        <label>Old Password</label>
                                                        <input class="form-control" type="password" name="oldpass"
                                                            id="old_password" required>
                                                    </div>
                                                    <div class="form-group  form-group-default required">
                                                        <label>New Password</label>
                                                        <input class="form-control" type="password" name="newpass"
                                                            id="new_password" required>
                                                    </div>
                                                    <div class="form-group  form-group-default required">
                                                        <label>Password Confirm</label>
                                                        <input class="form-control" type="password" name="renewpass"
                                                            id="change_password" required>
                                                    </div>
                                                    <button class="btn btn-primary btn-cons m-t-10" type="submit">Change
                                                        Password</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- END CONTAINER FLUID -->
            </div>

            <!-- END PAGE CONTENT -->
            @endsection
            @section('scripts')

            <script src="{{ URL::asset('assets/js/jquery.maskedinput.js')}}"></script>
            <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRu_qlT0HNjPcs45NXXiOSMd3btAUduSc&libraries=places&callback=initMap"
                async defer></script>
            {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
<script src="{{ URL::asset('assets2/js/user_account_address.js') }}"></script>
            @endsection
