@extends('layouts.front')
@section('content')
<div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="login-box clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                        {{ HTML::image('assets/img/account/login-questionmark-icon.png')}}
                       
                    </div>
                  
                    <div class="login-logo">
                        <a href="#?login-theme-3">
                            {{HTML::image('assets/sm_logo.png','',array('height'=>'140px','width'=>'192px'))}}
                           
                        </a>
                    </div>
                    <hr />
                    <div class="login-form">
                        <!-- BEGIN ERROR BOX -->
                        <div class="alert alert-danger hide">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Error!</h4>
                            Your Error Message goes here
                        </div>
                        <!-- END ERROR BOX -->
                        {{Form::open(array('route'=>'login-process'))}}
                            <p>Enter your email address below and we'll send a special reset password link to your inbox.</p>
                            {{Form::email('email','',array('class'=>'input-field form-control user','placeholder'=>'Your Email','required'))}}
                           
                            {{Form::submit('submit',array('class'=>'btn btn-login')) }}
                        {{ Form::close()}}
                        
                        <div class="login-links">
                           <a href="{{action('AccountController@showLogin')}}">Already have an account? <strong>Sign In</strong></a>
                            <br>
                            <a href="{{route('sign-up')}}"> Don't have an account? <strong>Sign Up</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop