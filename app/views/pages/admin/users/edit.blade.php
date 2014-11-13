@extends('layouts.master_admin',['title'=>'PT. Overseas Commercial Futures - Edit User'])
@section('content')
<section class="wrapper site-min-height">
              <!-- page start-->

              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Edit User
                          </header>
                          <div class="panel-body">
                                 @if(count($errors) >0)
                                            <div class="alert alert-block alert-danger fade in">
                                                <button type="button" class="close close-sm" data-dismiss="alert"> <i class="icon-remove"></i></button>
                                                <h4>Error!</h4>
                                                @foreach($errors->all() as $error)
                                                    <li> {{ $error}}</li>
                                                @endforeach
                                            </div>
                                        @endif
                                        @if(Session::has('pesanError'))
                                                    <div class="alert alert-block alert-danger fade in">
                                                        <button type="button" class="close close-sm" data-dismiss="alert" > <i class="icon-remove"></i></button>
                                                        {{ Session::get('pesanError') }}
                                                    </div>
                                                @endif
                              <div class="form">
                                {{ Form::model($user,array('route' => array('admin.users.update',$user->id),'class' =>'cmxform form-horizontal tasi-form','id'=>'signupForm','method'=>'PUT')) }}

                                      <div class="form-group ">
                                          <label for="firstname" class="control-label col-lg-2">Firstname</label>
                                          <div class="col-lg-10">
                                                {{Form::text('firstname',$user->first_name,array('class'=>' form-control','id'=>'firstname'))}}

                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="lastname" class="control-label col-lg-2">Lastname</label>
                                          <div class="col-lg-10">
                                              {{Form::text('lastname',$user->last_name,array('class'=>' form-control','id'=>'lastname'))}}
                                          </div>
                                      </div>
                                        <div class="form-group ">
                                           <label for="email" class="control-label col-lg-2">Email</label>
                                           <div class="col-lg-10">
                                              {{Form::email('email',$user->email,array('class'=>'form-control','id'=>'email','readonly'))}}
                                           </div>
                                       </div>

                                        <?php
                                        foreach($user->getGroups() as $d)
                                        {
                                            if($d->name!='client')
                                            {
                                                ?>
                                                    <div class="form-group ">
                                                        <label for="confirm_password" class="control-label col-lg-2">Group</label>
                                                        <div class="col-lg-10">
                                                        {{Form::select('group', $group, $d->id,array('class'=>'form-control m-bot15','id'=>'group'))}}

                                                        </div>
                                                    </div>
                                                  <?php
                                            }
                                        }
                                        ?>


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