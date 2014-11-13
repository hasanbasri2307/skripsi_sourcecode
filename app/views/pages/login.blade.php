@extends('layouts.login',['title'=>'PT Overseas Commercial Futures - Login'])
@section('content')
{{Form::open(array('route'=>'login-process','class'=>'form-signin'))}}
        {{ HTML::image('assets/img/sm_logo.png','',array('width'=>'150','height'=>'140','class'=>'form-signin-heading','style'=>'margin-left:90px'))}}
        
        <div class="login-wrap">
        @if(Session::has('pesanError'))
            <div class="alert alert-block alert-danger fade in">
                <button type="button" class="close close-sm" data-dismiss="alert" > <i class="icon-remove"></i></button>
                {{ Session::get('pesanError') }}
            </div>
        @endif
                        
        @if(Session::has('pesanSuccess'))
            <div class="alert alert-block alert-success fade in">
                <button type="button" class="close close-sm" data-dismiss="alert" aria-hidden="true"> <i class="icon-remove"></i></button>
                {{ Session::get('pesanSuccess') }}
            </div>
        @endif
                        
        @if(count($errors) >0)
            <div class="alert alert-block alert-danger fade in">
                <button type="button" class="close close-sm" data-dismiss="alert"> <i class="icon-remove"></i></button>
                <h4>Error!</h4>
                @foreach($errors->all() as $error)
                    <li> {{ $error}}</li>
                @endforeach
            </div>
        @endif
        
            {{Form::email('email','',array('class'=>'form-control','placeholder'=>'Your Email','required','autofocus'))}}
            {{Form::password('password',array('class'=>'form-control','placeholder'=>'Your Password','required')) }}
            
            
            <label class="checkbox"> 
                {{Form::checkbox('rememberme','1',false)}}Remember me
                
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
            </label>
            {{Form::submit('Sign In',array('class'=>'btn btn-lg btn-login btn-block')) }}
            {{Form::close()}}
            
            <div class="registration">
                Don't have an account yet?
                <a class="" href="{{route('sign-up')}}">
                    Create an account
                </a>
            </div>

        </div>
        {{Form::open(array('route'=>'send-reset-link'))}}
          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          {{Form::email('email','',array('class'=>'form-control placeholder-no-fix','placeholder'=>'Your Email','required','autofocus'))}}
                         

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          {{Form::submit('Send',array('class'=>'btn btn-success')) }}
                          
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      {{Form::close()}}

@stop