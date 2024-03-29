@extends('includes.newmaster2')

@section('content')

<div class="home-wrapper">
    <div class="section-padding login-area-wrapper wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-xs-12 hidden-xs col-sm-offset-2">
                    <div class="text-right">
                        <img class="login-logo" src="{{ url('/assets/img/ube_logo_ig.png') }}">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="signIn-area">
                        <h2 class="signIn-title">Change Password</h2>
                        <hr />
                        <form action="{{ url('/vendor/changePassword') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="password">Password <span>*</span></label>
                                <input class="form-control" type="password" name="password" id="password" value="{{ old('password') }}" required>
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                <input type="hidden" value="{{ $id }}" name="vendor_id" id="vendor_id">
                            </div>
                            <div class="form-group">
                                <label for="password">Confirm Password <span>*</span></label>
                                <input class="form-control" type="password" name="password_confirmation" id="con_pwd" value="{{ old('password_confirmation') }}" required>
                                <span toggle="#con_pwd" class="fa fa-fw fa-eye field-icon toggle-password-1" ></span>
                            </div>
                            
                            <!-- <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <a href="{{route('vendor.reg')}}">Create New Account</a>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 text-right">
                                        <a href="{{route('vendor.forgotpass')}}">Forgot your Password?</a>
                                    </div>
                                </div>
                            </div> -->
                            <div id="resp">

                                @if ($errors->has('email'))
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ $errors->first('email') }}
                                </div>

                                @endif
                                @if ($errors->has('password'))
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ $errors->first('password') }}
                                </div>
                                @endif
                                @if(Session::has('error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ Session::get('error') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <input class="btn btn-md login-btn" type="submit" value="CHANGE">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
<script src="{{ URL::asset('assets2/change_password.js') }}"></script>

@stop