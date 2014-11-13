@extends('layouts.master_admin',['title'=>'PT. Overseas Commercial Futures - Report Users'])
@section('content')
<section class="wrapper site-min-height">
              <!-- page start-->

              <div class="row">
                  <div class="col-lg-12">
                    <section class="panel">
                          <div class="panel-body">
                          @if(isset($all))

                                <a href="{{route('admin.report_user.to_excel',array('condition'=>0,'user_type'=>0,'all'=>$all))}}"><button type="button" class="btn btn-success"><i class="icon-plus"></i> Export To Excel </button></a>
                                <a href="{{route('admin.report_user.to_pdf',array('condition'=>0,'user_type'=>0,'all'=>$all))}}"><button type="button" class="btn btn-success"><i class="icon-plus"></i> Export To PDF </button></a>
                           @else
                                <a href="{{route('admin.report_user.to_excel',array('condition'=>$condition,'user_type'=>$user_type,'all'=>0))}}"><button type="button" class="btn btn-success"><i class="icon-plus"></i> Export To Excel </button></a>
                                <a href="{{route('admin.report_user.to_pdf',array('condition'=>$condition,'user_type'=>$user_type,'all'=>0))}}"><button type="button" class="btn btn-success"><i class="icon-plus"></i> Export To PDF </button></a>
                          @endif


                          </div>
                     </section>
                      <section class="panel">
                          <header class="panel-heading">
                              Users (<B>{{($condition) ? $condition : 'ALL Users'}}</B>)

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

                                          <th class="hidden-phone">Group</th>
                                          <th class="hidden-phone">Status</th>

                                      </tr>
                                      </thead>
                                      <tbody>

                                      @foreach($users as $user)
                                      <tr class="gradeX">

                                          <td>{{$user->first_name.' '.$user->last_name}}
                                          <td>{{$user->email }}</td>
                                          <td class="center hidden-phone">{{($user->last_login) ? $user->last_login : '-'}}</td>
                                          <td class="center hidden-phone">{{($user->activated_at) ? $user->activated_at : '-'}}</td>

                                          <td class="center hidden-phone">{{'<span class="label label-inverse label-mini">'.$user->name.'</span>'}}</td>
                                          <th class="center hidden-phone">{{($user->activated ==1) ? '<span class="label label-success label-mini">Actived</span>':'<span class="label label-danger label-mini">Unactive</span>'}}</th>

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