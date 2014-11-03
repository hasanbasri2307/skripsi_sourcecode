@extends('layouts.front')
@section('content')
<div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="login-box clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                        {{ HTML::image('assets/img/account/user-icon.png')}}
                        
                    </div>
                    <div class="login-logo">
                        <a href="#?login-theme-3">
                            {{HTML::image('assets/sm_logo.png','',array('height'=>'140px','width'=>'192px'))}}
                           
                        </a>
                    </div>
                    <hr>
                    <div class="login-form">
                        <!-- BEGIN ERROR BOX -->
                        <div class="alert alert-danger hide">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4>Error!</h4>
                            Your Error Message goes here
                        </div>
                        <!-- END ERROR BOX -->
                        {{Form::open(array('route'=>'login-process'))}}
                            {{Form::text('username','',array('class'=>'input-field form-control user','placeholder'=>'Your Email'))}}
                            {{Form::password('password',array('class'=>'input-field form-control password','placeholder'=>'Your Password')) }}
                            {{Form::submit('submit',array('class'=>'btn btn-login')) }}
                        {{ Form::close()}}
                        <div class="login-links">
                            <a href="{{route('forgot-password')}}">Forgot password?</a>
                            <br>
                            <a href="{{route('sign-up')}}">Don't have an account? <strong>Sign Up</strong></a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@stop