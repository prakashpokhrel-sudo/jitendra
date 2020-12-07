@extends('layouts.app', ['activePage' => 'post_list', 'titlePage' => __('Manage Blog Post')])

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
            <p class="card-category"> Here is a subtitle for this table</p>
          </div>
        <div class="col-md-2">
          <a type="button" class="btn btn-success" href="{{route('addblogmanage')}}">Add New Post </a>
        </div>
          </div>
            </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th >Post Title</th>
                          <th >Post Category</th>
                          <th style="padding:0 0 0 25px;" >Image</th>
                          <th 
                          >Action</th>
                     
                          
                        </tr>
                      </thead>
                     <tbody>
                        @foreach($post as $key=>$row)

                      
                        <tr>
                          <td >{{$row->post_title_en}}
                        </td>
                          <td style="padding:0 0 0 15px" >{{$row->category_name_en}}</td>
                          <td style="padding:0 0 0 0px"  >
                            <img src="{{asset('images/blog/'.$row->post_image)}}" height="150px;" width="150px;"> 
                          </td>
                                                   
                          <td class="td-actions ">
                            
                            <a href="{{route('edit.post.list',$row->id)}}" type="button"  rel="tooltip" class="btn btn-success" >
                              <i class="material-icons">edit</i>
                            </button>

                           <a type="button" rel="tooltip" class="btn btn-danger" href="{{route('delete.post.list',$row->id)}}" >
                              <i class="material-icons">delete</i>
                            </a>
                          </td>
                        </tr>

                        @endforeach
                      </tbody>

                    </table>
                  </div>
                </div>
              </div>
              {{$post->links()}}
            </div>
            
          </div>
        </div>
      </div>

      @endsection