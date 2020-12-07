@extends('layouts.app', ['activePage' => 'pages', 'titlePage' => __('Manage Blog Post')])

@section('content')

 <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="row">
            <div class="col-md-10">
            <h4 class="card-title ">Manage About-Us Page</h4>
            
            <p class="card-category">
            <a href="{{route('team.list')}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-plus"></i> Manage Team Details</a>
      
            <a href="{{route('review.list')}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-plus"></i> Manage Review</a>
            
            <a href="{{route('contact.index')}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-plus"></i> Contact Page</a>

             <a href="{{route('gallerymanage')}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-plus"></i> Manage Gallery</a>
           </p>
    
       </div>
        <div class="col-md-2">
          <a type="button" class="btn btn-success" href="{{route('manage.page')}}">Manage Page </a>
        </div>
          </div>
            </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          
                          <th style="padding:0 0 0 25px;" >Image</th>
                          <th>title</th>
                          <th>status</th>
                         
                          <th 
                          >Action</th>
                     
                          
                        </tr>
                      </thead>
                     <tbody>
                        @foreach($pageview as $key=>$row)

                      
                        <tr>
                          <td style="padding:0 0 0 0px"  >
                            <img src="{{asset('images/pages/'.$row->page_image)}}" height="150px;" width="150px;">
                          </td>

                          <td >{{$row->title}}
                        </td>
                          
                          
                           <td>
              @if($row->status == 1) 
              <span class="badge badge-success"> Active</span>
              @else 
              <span class="badge badge-danger">Inactive</span> 
              @endif      
                    </td>
                                                   
                          <td class="td-actions ">
                            
                            <a href="{{route('edit.page.list',$row->id)}}" type="button"  rel="tooltip" class="btn btn-success" >
                              <i class="material-icons">edit</i>
                            </button>

                           <a type="button" rel="tooltip" class="btn btn-danger" href="{{route('delete.page.list',$row->id)}}" >
                              <i class="material-icons">delete</i>
                            </a>

              @if($row->status == 1) 
            <a class="btn btn-danger btn-sm" href="{{route('page.inactive',$row->id)}}"><i class="fa fa-thumbs-down"></i></a>   
              @else 
              <a class="btn btn-info btn-sm" href="{{route('page.active',$row->id)}}"><i class="fa fa-thumbs-up"></i></a>
              @endif 
                          </td>
                        </tr>

                        @endforeach
                      </tbody>

                    </table>
                  </div>
                </div>
              </div>
              {{$pageview->links()}}
            </div>
            
          </div>
        </div>
      </div>

      @endsection