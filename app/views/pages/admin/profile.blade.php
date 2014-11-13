@extends('layouts.master_admin',['title'=>'PT. Overseas Commercial Futures - Profile'])
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
                              <li class="active"><a href="{{route('admin.profile')}}"> <i class="icon-user"></i> Profile</a></li>
                              <li><a href="{{route('admin.profile.edit')}}"> <i class="icon-edit"></i> Edit profile</a></li>
                          </ul>

                      </section>
                  </aside>
                  <aside class="profile-info col-lg-9">

                      <section class="panel">
                          <div class="bio-graph-heading">
                             My Profile
                          </div>
                          <div class="panel-body bio-graph-info">
                              <h1>Bio Graph</h1>
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
                              <div class="row">
                                  <div class="bio-row">
                                      <p><span>First Name </span>: {{$user->first_name}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Last Name </span>: {{$user->last_name}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Email </span>: {{$user->email}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Activated At</span>: {{$user->activated_at}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Last Login </span>: {{$user->last_login}}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Group </span>: @foreach($user->getGroups() as $data) {{ $data->name }} @endforeach</p>
                                  </div>

                              </div>
                          </div>
                      </section>

                  </aside>
              </div>

              <!-- page end-->
          </section>
          @stop