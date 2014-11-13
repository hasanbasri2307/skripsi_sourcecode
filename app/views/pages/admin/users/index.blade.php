@extends('layouts.master_admin',['title'=>'PT. Overseas Commercial Futures - Users'])
@section('content')
<section class="wrapper site-min-height">
              <!-- page start-->

              <div class="row">
                  <div class="col-lg-12">
                    <section class="panel">
                          <div class="panel-body">
                              <a href="{{route('admin.users.create')}}"><button type="button" class="btn btn-success"><i class="icon-plus"></i> Add User </button></a>
                              @if(Session::has('pesanError'))

                                          <div class="alert alert-block alert-danger fade in">
                                              <button type="button" class="close close-sm" data-dismiss="alert" > <i class="icon-remove"></i></button>
                                              {{ Session::get('pesanError') }}
                                          </div>
                                      @endif

                                      @if(Session::has('pesanSuccess'))

                                       <br><br>
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
                          </div>
                     </section>
                      <section class="panel">
                          <header class="panel-heading">
                              Users

                          </header>

                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>

                                          <th>Fullname</th>
                                          <th>Email</th>
                                          <th class="hidden-phone">Last Login</th>
                                          <th class="hidden-phone">Active At</th>
                                          <th class="hidden-phone">Status</th>
                                          <th class="hidden-phone"></th>
                                      </tr>
                                      </thead>
                                      <tbody>

                                      @foreach($users as $user)
                                      <tr class="gradeX">

                                          <td>{{$user->first_name.' '.$user->last_name}}
                                          <td>{{$user->email }}</td>
                                          <td class="center hidden-phone">{{($user->last_login) ? $user->last_login : '-'}}</td>
                                          <td class="center hidden-phone">{{($user->activated_at) ? $user->activated_at : '-'}}</td>
                                          <th class="center hidden-phone">{{($user->activated ==1) ? '<span class="label label-success label-mini">Actived</span>':'<span class="label label-danger label-mini">Unactive</span>'}}</th>
                                          <td class="center hidden-phone">
                                          <?php
                                          foreach($user->getGroups() as $d)
                                          {
                                             if($d->name=='client')
                                             {
                                                ?>
                                                <a href="{{route('admin.users.show',$user->id)}}"><button class="btn btn-success btn-xs"><i class="icon-ok"></i></button></a>

                                                <a href="{{route('admin.users.delete',$user->id)}}" onclick="return confirm('Are You Sure to Delete This User?');"><button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button></a>
                                               <?php
                                             }
                                             else
                                             {

                                                 ?>
                                                 <a href="{{route('admin.users.show',$user->id)}}"><button class="btn btn-success btn-xs"><i class="icon-ok"></i></button></a>
                                                 <a href="{{route('admin.users.edit',$user->id)}}"><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
                                                 <a href="{{route('admin.users.delete',$user->id)}}" onclick="return confirm('Are You Sure to Delete This User?');"><button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button></a>
                                                <?php
                                             }
                                          }
                                        ?>
                                          </td>
                                      </tr>

                                    @endforeach
                                      </tbody>

                                    </table>
                                </div>
                          </div>

                      </section>

                  </div>

              </div>
              <!-- page end-->
          </section>
    @stop