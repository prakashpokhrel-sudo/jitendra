@extends('layouts.app', ['activePage' => 'banner', 'titlePage' => __('Manage Blog Post')])

@section('content')

 <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="row">
            <div class="col-md-10">
            <h4 class="card-title ">Simple Table</h4>
            <p class="card-category">Best Slider Image Size(2000*1350pixel) </p>
          </div>
        <div class="col-md-2">
          <a type="button" class="btn btn-success" href="{{route('manage.slider')}}">Add New Banner </a>
        </div>
          </div>
            </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          
                          <th style="padding:0 0 0 25px;" >Banner Image</th>
                          <th>Banner Description(1)</th>
                          <th>Banner Description(2)</th>
                          <th>Status</th>
                          <th 
                          >Action</th>
                     
                          
                        </tr>
                      </thead>
                     <tbody>
                        @foreach($bannerview as $key=>$row)

                      
                        <tr>
                          <td style="padding:0 0 0 0px"  >
                            <img src="{{asset('images/banner/'.$row->slider_image)}}" height="150px;" width="150px;">
                          </td>

                          <td >{{$row->description1}}
                        </td>
                          <td style="padding:0 0 0 15px" >{{$row->description2}}</td>
                          
                           <td>
              @if($row->status == 1) 
              <span class="badge badge-success"> Active</span>
              @else 
              <span class="badge badge-danger">Inactive</span> 
              @endif      
                    </td>
                                                   
                          <td class="td-actions ">
                            
                            <a href="{{route('edit.banner.list',$row->id)}}" type="button"  rel="tooltip" class="btn btn-success" >
                              <i class="material-icons">edit</i>
                            </button>

                           <a type="button" rel="tooltip" class="btn btn-danger" href="{{route('delete.banner.list',$row->id)}}" >
                              <i class="material-icons">delete</i>
                            </a>

                @if($row->status == 1) 
            <a class="btn btn-danger btn-sm" href="{{route('banner.inactive',$row->id)}}"><i class="fa fa-thumbs-down"></i></a>   
              @else 
              <a class="btn btn-info btn-sm" href="{{route('banner.active',$row->id)}}"><i class="fa fa-thumbs-up"></i></a>
              @endif 
                          </td>
                        </tr>

                        @endforeach
                      </tbody>

                    </table>
                  </div>
                </div>
              </div>
              {{$bannerview->links()}}
            </div>
            
          </div>
        </div>
      </div>

      @endsection