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
                        <a href="#">
                           {{HTML::image('assets/sm_logo.png','',array('height'=>'140px','width'=>'192px'))}}
                        </a>
                    </div>
                    <hr>
                    <div class="login-form">
                        <!-- Start Error box -->
                        @if(Session::has('pesan'))
                            <div class="alert alert-success fade in">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        {{ Session::get('pesan') }}
                            </div>
                        @endif
                        
                        @if(count($errors) >0)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <h4>Error!</h4>
                                @foreach($errors->all() as $error)
                                    <li> {{ $error}}</li>
                                @endforeach
                            </div>
                        @endif
                        <!-- End Error box -->
                        {{Form::open(array('route'=>'sign-up-process'))}}
                            {{Form::text('fullname','',array('class'=>'input-field','placeholder'=>'Fullname','required'))}}
                            {{Form::email('email','',array('class'=>'input-field','placeholder'=>'Email','required'))}}
                            {{Form::text('telp','',array('class'=>'input-field','placeholder'=>'Phone','required'))}}
                            {{Form::password('password',array('class'=>'input-field ','placeholder'=>'Password','required')) }}
                            {{Form::password('password_confirmation',array('class'=>'input-field ','placeholder'=>'Confirm Password','required')) }}
                            
                        
                            <label class="checkbox">
                                {{Form::checkbox('agree','1')}}I agree to something I will never read
                            </label>
                             {{Form::submit('Sign Up',array('class'=>'btn btn-login')) }}
                        {{ Form::close()}}
                        <div class="login-links">
                            <a href="{{route('forgot-password')}}">Forgot password?</a>
                            <br>
                            <a href="{{action('AccountController@showLogin')}}">Already have an account? <strong>Sign In</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop