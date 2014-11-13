@extends('layouts.master_admin',['title'=>'PT. Overseas Commercial Futures - Detail User'])
@section('content')
<section class="wrapper site-min-height">
              <!-- invoice start-->
              <section>
              <section class="panel">
                                        <div class="panel-body">
                                           <h4 style="font-style: normal;color: #FE6B5F;">Detail User #{{$user->id}}</h4>
                                        </div>
                                   </section>
                  <div class="panel panel-primary">
                      <!--<div class="panel-heading navyblue"> INVOICE</div>-->
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

                          <table class="table table-striped table-hover">

                              <tr>
                                  <th>Fullname</th>
                                  <td>:</td>
                                  <td class="hidden-phone">{{$user->first_name.' '.$user->last_name}}</td>

                              </tr>
                              <tr>
                                  <th>Email</th>
                                  <td>:</td>
                                  <td class="hidden-phone">{{$user->email}}</td>

                              </tr>
                               <tr>
                                   <th>Activated At</th>
                                   <td>:</td>
                                   <td class="hidden-phone">{{$user->activated_at}}</td>

                               </tr>
                                <tr>
                                    <th>Last Login</th>
                                    <td>:</td>
                                    <td class="hidden-phone">{{$user->last_login}}</td>

                                </tr>

                                 <tr>
                                      <th>Group</th>
                                      <td>:</td>
                                      <td class="hidden-phone">@foreach($user->getGroups() as $data) {{ '<span class="label label-info label-mini">'.$data->name.'</span>'}}@endforeach</td>

                                  </tr>
                                 <tr>
                                      <th>Status</th>
                                      <td>:</td>
                                      <td class="hidden-phone">{{($user->activated ==1) ? '<span class="label label-success label-mini">Actived</span>':'<span class="label label-danger label-mini">Unactive</span>'}}</td>

                                  </tr>
                          </table>

                          <div class="text-center invoice-btn">


                              @if($throttle->isSuspended())
                                <a class="btn btn-info btn-lg" href="{{route("admin.users.unsuspend",$user->id)}}" onclick="return confirm('Are You Sure to Unsuspend This User?');"><i class="icon-print"></i> Unsuspend </a>
                              @else
                                <a class="btn btn-danger btn-lg" href="{{route("admin.users.suspend",$user->id)}}" onclick="return confirm('Are You Sure to Suspend This User?');"><i class="icon-check"></i> Suspend </a>
                              @endif

                              @if($throttle->isBanned())
                                <a class="btn btn-info btn-lg" href="{{route("admin.users.unbanned",$user->id)}}" onclick="return confirm('Are You Sure to Unbanned This User?');"><i class="icon-print"></i> Unbanned </a>
                              @else
                               <a class="btn btn-danger btn-lg" href="{{route("admin.users.banned",$user->id)}}" onclick="return confirm('Are You Sure to Banned This User?');"><i class="icon-check"></i> Banned </a>
                              @endif
                          </div>
                      </div>
                  </div>
              </section>
              <!-- invoice end-->
          </section>
         @stop