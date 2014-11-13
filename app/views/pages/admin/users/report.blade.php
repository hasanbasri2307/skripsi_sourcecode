@extends('layouts.master_admin',['title'=>'PT. Overseas Commercial Futures - Report User'])
@section('content')
<section class="wrapper site-min-height">
              <!-- page start-->

              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Report User
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
                              <div class="form">
                                {{ Form::open(array('route' => 'admin.report_user.process','class' =>'cmxform form-horizontal tasi-form','id'=>'')) }}

                                      <div class="form-group ">
                                          <label for="firstname" class="control-label col-lg-2">User Type</label>
                                          <div class="col-lg-10">
                                                {{Form::select('user_type', $group, '',array('class'=>'form-control m-bot15','id'=>'user_type'))}}

                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="lastname" class="control-label col-lg-2">Condition</label>
                                          <div class="col-lg-10">
                                             {{Form::select('condition', $condition, '',array('class'=>'form-control m-bot15','id'=>'condition'))}}
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                           <label for="email" class="control-label col-lg-2">All</label>
                                           <div class="col-lg-10">
                                              {{Form::checkbox('all', 'value', false,array('id'=>'all'));}}
                                           </div>
                                       </div>


                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">

                                              {{Form::submit('submit', array('class'=>'btn btn-danger'))}}
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