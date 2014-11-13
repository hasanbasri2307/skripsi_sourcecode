@extends('layouts.master_admin',['title'=>'PT. Overseas Commercial Futures - Add Docs'])
@section('content')
<section class="wrapper site-min-height">
              <!-- page start-->

              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Add Docs
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
                                {{ Form::open(array('route' => 'admin.docs.store','class' =>'cmxform form-horizontal tasi-form','id'=>'docsForm','files'=>true)) }}

                                      <div class="form-group ">
                                          <label for="firstname" class="control-label col-lg-2">No. Docs</label>
                                          <div class="col-lg-10">
                                                {{Form::text('no_docs','',array('class'=>' form-control','id'=>'no_docs'))}}

                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="lastname" class="control-label col-lg-2">Title</label>
                                          <div class="col-lg-10">
                                              {{Form::text('title','',array('class'=>' form-control','id'=>'title'))}}
                                          </div>
                                      </div>

                                       <div class="form-group ">
                                           <label for="lastname" class="control-label col-lg-2">Content</label>
                                           <div class="col-lg-10">
                                               {{Form::textarea('content','',array('class'=>' form-control','id'=>'content'))}}
                                           </div>
                                       </div>
                                        <div class="form-group ">
                                           <label for="email" class="control-label col-lg-2">File</label>
                                            <div class="col-lg-10">
                                               <div class="fileupload fileupload-new" data-provides="fileupload">
                                                 <span class="btn btn-white btn-file">
                                                 <span class="fileupload-new"><i class="icon-paper-clip"></i> Select file</span>
                                                 <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                 {{ Form::file('file',null,array('class'=>'default','required')) }}
                                                 </span>
                                                   <span class="fileupload-preview" style="margin-left:5px;"></span>
                                                   <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                               </div>
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