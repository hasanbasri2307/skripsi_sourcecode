@extends('......layouts.master_admin',['title'=>'PT. Overseas Commercial Futures - Change Password'])
@section('content')
<section class="wrapper site-min-height">
              <!-- page start-->

              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Change Password
                          </header>
                          <div class="panel-body">
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
                              <div class="form">
                                {{ Form::open(array('route' => 'admin.docp','class' =>'cmxform form-horizontal tasi-form','id'=>'changePassword')) }}

                                      <div class="form-group ">
                                          <label for="password" class="control-label col-lg-2">Old Password</label>
                                          <div class="col-lg-10">
                                             {{Form::password('old_password',array('class'=>'form-control','id'=>'old_password'))}}
                                          </div>
                                      </div>


                                      <div class="form-group ">
                                          <label for="password" class="control-label col-lg-2">New Password</label>
                                          <div class="col-lg-10">
                                             {{Form::password('password',array('class'=>'form-control','id'=>'password'))}}
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="confirm_password" class="control-label col-lg-2">Confirm Password</label>
                                          <div class="col-lg-10">
                                             {{Form::password('password_confirmation',array('class'=>'form-control','id'=>'password_confirmation'))}}
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit">Save</button>
                                              <button class="btn btn-default" type="button">Cancel</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
          @stop