@extends('layouts.master_admin',['title'=>'PT. Overseas Commercial Futures - Documents'])
@section('content')
<section class="wrapper site-min-height">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                    <section class="panel">
                          <div class="panel-body">
                              <a href="{{route('admin.docs.create')}}"><button type="button" class="btn btn-success"><i class="icon-plus"></i> Add Docs </button></a>

                              @if(Session::has('pesanError'))
                                         <br><br>
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
                                         <br><br>
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
                              Documents

                          </header>

                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>

                                          <th>No Docs</th>
                                          <th>Judul</th>
                                          <th class="hidden-phone">File</th>
                                          <th class="hidden-phone"></th>
                                      </tr>
                                      </thead>
                                      <tbody>

                                      @foreach($docs as $doc)
                                      <tr class="gradeX">

                                          <td>{{$doc->no_doc}}
                                          <td>{{$doc->judul }}</td>
                                          <td class="center hidden-phone"><a href="{{route('admin.docs.download',$doc->file)}}" target="_blank">{{$doc->file}}</a> </td>
                                          <td>
                                                 <a href="{{route('admin.docs.show',$doc->id_doc)}}"><button class="btn btn-success btn-xs"><i class="icon-ok"></i></button></a>
                                                 <a href="{{route('admin.docs.edit',$doc->id_doc)}}"><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
                                                 <a href="{{route('admin.docs.delete',$doc->id_doc)}}" onclick="return confirm('Are You Sure to Delete This File?');"><button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button></a>

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