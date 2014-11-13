@extends('layouts.master_admin',['title'=>'PT. Overseas Commercial Futures - Edit Profile'])
@section('content')
<section class="wrapper site-min-height">
              <!-- page start-->
              <div class="row">
                  <aside class="profile-nav col-lg-3">
                      <section class="panel">
                          <div class="user-heading round">
                                <a href="#">
                                {{HTML::image('assets/img/user.png','',array('height'=>'140','width'=>'140'))}}

                              </a>
                              <h1>{{$user->first_name.' '.$user->last_name}}</h1>
                              <p>{{$user->email}}</p>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li><a href="{{route('admin.profile')}}"> <i class="icon-user"></i> Profile</a></li>

                              <li  class="active"><a href="{{route('admin.profile.edit')}}"> <i class="icon-edit"></i> Edit profile</a></li>
                          </ul>

                      </section>
                  </aside>
                  <aside class="profile-info col-lg-9">
                      <section class="panel">
                          <div class="bio-graph-heading">
                             My Profile
                          </div>
                          <div class="panel-body bio-graph-info">
                              <h1> Profile Info</h1>
                                 @if(count($errors) >0)
                                   <div class="alert alert-block alert-danger fade in">
                                                          <button type="button" class="close close-sm" data-dismiss="alert"> <i class="icon-remove"></i></button>
                                                          <h4>Error!</h4>
                                                          @foreach($errors->all() as $error)
                                                              <li> {{ $error}}</li>
                                                          @endforeach
                                                      </div>
                                @endif
                              {{ Form::open(array('route' => 'admin.editprofile.process','class' =>'cmxform form-horizontal','id'=>'editProfile')) }}


                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">First Name</label>
                                      <div class="col-lg-6">
                                          <input type="text" class="form-control" id="first_name" placeholder=" " name="first_name" value="{{$user->first_name}}">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Last Name</label>
                                      <div class="col-lg-6">
                                          <input type="text" class="form-control" id="last_name" placeholder=" " name="last_name" value="{{$user->last_name}}">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Email</label>
                                      <div class="col-lg-6">
                                          <input type="text" class="form-control" id="email" placeholder=" " name="email" value="{{$user->email}}" disabled>
                                      </div>
                                  </div>
                                    <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button type="submit" class="btn btn-info">Save</button>
                                              <button type="button" class="btn btn-default">Cancel</button>
                                          </div>
                                      </div>
                              </form>
                          </div>
                      </section>

                  </aside>
              </div>

              <!-- page end-->
          </section>

          @stop