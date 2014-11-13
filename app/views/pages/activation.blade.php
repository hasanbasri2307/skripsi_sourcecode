@extends('layouts.login',['title'=>'PT Overseas Commercial Futures - Activation Account'])
@section('content')

{{Form::open(array('route'=>'activation-account','class'=>'form-signin'))}}

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
        
            {{Form::text('activation_code','',array('class'=>'form-control','placeholder'=>'Activation Code','required','autofocus'))}}
            {{Form::hidden('email',$email)}}
            {{Form::submit('Activation',array('class'=>'btn btn-lg btn-login btn-block')) }}
             {{Form::close()}}
            
            

        </div>

         

     

@stop