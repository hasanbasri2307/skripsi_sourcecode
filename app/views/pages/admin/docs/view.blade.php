@extends('layouts.master_admin',['title'=>'PT. Overseas Commercial Futures - Detail Docs'])
@section('content')
<section class="wrapper site-min-height">
              <!-- invoice start-->
              <section>
                    <section class="panel">
                          <div class="panel-body">
                             <h4 style="font-style: normal;color: #FE6B5F;">Detail Document #{{$doc->id_doc}}</h4>
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
                                  <th>No Document</th>
                                  <td>:</td>
                                  <td class="hidden-phone">{{$doc->no_doc}}</td>

                              </tr>
                              <tr>
                                  <th>Title</th>
                                  <td>:</td>
                                  <td class="hidden-phone">{{$doc->judul}}</td>

                              </tr>
                               <tr>
                                   <th>Content</th>
                                   <td>:</td>
                                   <td class="hidden-phone">{{$doc->content}}</td>

                               </tr>
                                <tr>
                                    <th>File</th>
                                    <td>:</td>
                                    <td class="hidden-phone"><a href="{{route('admin.docs.download',$doc->file)}}" target="_blank">{{$doc->file}}</a> </td>

                                </tr>


                          </table>


                      </div>
                  </div>
              </section>
              <!-- invoice end-->
          </section>
         @stop