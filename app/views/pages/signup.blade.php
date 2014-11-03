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
                        <div class="alert alert-danger hide">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Error!</h4>
                            Your Error Message goes here
                        </div>
                        <!-- End Error box -->
                        <form action="#" method="get">
                            <input type="text" placeholder="Name" class="input-field" required/>
                            <input type="email" placeholder="E-mail" class="input-field" required/>
                            <input type="password" placeholder="Password" class="input-field" required/>
                            <input type="password" placeholder="Confirm Password" class="input-field" required/>
                            <label class="checkbox">
                                <input type="checkbox" value="option1" required>I agree to something I will never read
                            </label>
                            <button type="submit" class="btn btn-login">Sign Up</button>
                        </form>
                        <div class="login-links">
                            <a href="password_forgot.html">Forgot password?</a>
                            <br>
                            <a href="login.html">Already have an account? <strong>Sign In</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop