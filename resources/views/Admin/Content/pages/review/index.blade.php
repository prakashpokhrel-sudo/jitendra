@extends('layouts.app', ['activePage' => 'pages', 'titlePage' => __('Manage Review Page')])

@section('content')

 <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="row">
            <div class="col-md-10">
            <h4 class="card-title ">Manage Review Page</h4>
            
            <p class="card-category">
        <a href="{{route('team.list')}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-plus"></i> Manage Team Details</a>
      
   
            
    <a href="{{route('page.list')}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-plus"></i> Manage About Us</a>
               
    <a href="{{route('contact.index')}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-plus"></i> Contact Page</a>

      <a href="{{route('gallerymanage')}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-plus"></i>Manage Gallery</a>

           </p>
     
       </div>
        <div class="col-md-2">
          <a type="button" class="btn btn-success" href="{{route('Manage.Review')}}">Create New Review </a>
        </div>
          </div>
            </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          
                          <th style="padding:0 0 0 25px;" >Image</th>
                          <th>Name</th>
                          <th>Profile</th>
                          
                          
                         
                          <th 
                          >Action</th>
                     
                          
                        </tr>
                      </thead>
                     <tbody>
                        @foreach($reviewlist as $key=>$row)

                      
                        <tr>
                          <td style="padding:0 0 0 0px"  >
                            <img src="{{asset('images/reviews/'.$row->review_image)}}" height="150px;" width="150px;">
                          </td>

                          <td >{{$row->name}}
                        </td>
                       <td >{{$row->profile}}
                        </td>
                          
                          
                           <td>
              @if($row->status == 1) 
              <span class="badge badge-success"> Active</span>
              @else 
              <span class="badge badge-danger">Inactive</span> 
              @endif      
                    </td>
                                                   
                          <td class="td-actions ">
                            
                            <a href="{{route('edit.review.list',$row->id)}}" type="button"  rel="tooltip" class="btn btn-success" >
                              <i class="material-icons">edit</i>
                            </button>

                           <a type="button" rel="tooltip" class="btn btn-danger" href="{{route('delete.review.list',$row->id)}}" >
                              <i class="material-icons">delete</i>
                            </a>

              @if($row->status == 1) 
            <a class="btn btn-danger btn-sm" href="{{route('review.inactive',$row->id)}}"><i class="fa fa-thumbs-down"></i></a>   
              @else 
              <a class="btn btn-info btn-sm" href="{{route('review.active',$row->id)}}"><i class="fa fa-thumbs-up"></i></a>
              @endif 
                          </td>
                        </tr>

                        @endforeach
                      </tbody>

                    </table>
                  </div>
                </div>
              </div>
              {{$reviewlist->links()}}
            </div>
            
          </div>
        </div>
      </div>

      @endsection