@extends('layouts.master_admin',['title'=>'PT. Overseas Commercial Futures - Edit Docs'])
@section('content')
<section class="wrapper site-min-height">
              <!-- page start-->

              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Edit Docs
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
                                {{ Form::model($doc,array('route' => array('admin.docs.update',$doc->id_doc),'class' =>'cmxform form-horizontal tasi-form','id'=>'docsForm','files'=>true,'method'=>'PUT')) }}

                                      <div class="form-group ">
                                          <label for="firstname" class="control-label col-lg-2">No. Docs</label>
                                          <div class="col-lg-10">
                                                {{Form::text('no_docs',$doc->no_doc,array('class'=>' form-control','id'=>'no_docs'))}}

                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="lastname" class="control-label col-lg-2">Title</label>
                                          <div class="col-lg-10">
                                              {{Form::text('title',$doc->judul,array('class'=>' form-control','id'=>'title'))}}
                                          </div>
                                      </div>

                                       <div class="form-group ">
                                           <label for="lastname" class="control-label col-lg-2">Content</label>
                                           <div class="col-lg-10">
                                               {{Form::textarea('content',$doc->content,array('class'=>' form-control','id'=>'content'))}}
                                           </div>
                                       </div>
                                        <div class="form-group ">
                                           <label for="email" class="control-label col-lg-2">File</label>
                                            <div class="col-lg-10">
                                                <?php
                                                if($doc->file)
                                                {
                                                    ?>
                                                    <a href="{{route('admin.docs.download',$doc->file)}}" target="_blank">{{$doc->file}}</a>&nbsp &nbsp <a data-action="{{route('admin.docs.fileDelete')}}" href="#" data-id="{{$doc->id_doc}}" title="delete" class="delete-file"><i class="icon-remove"></i></a>
                                                    {{Form::hidden('filehidden',$doc->file)}}
                                                    <br>
                                                    <?php
                                                }
                                                ?>
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