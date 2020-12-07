@extends('layouts.app', ['activePage' => 'pages', 'titlePage' => __('Manage Contact Page')])

@section('content')

 <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="row">
            <div class="col-md-10">
            <h4 class="card-title ">Contact Page</h4>
            
            <p class="card-category">

  <a href="{{route('team.list')}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-plus"></i> Manage Team Details</a>
      
  <a href="{{route('review.list')}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-plus"></i> Manage Review</a>
            
  <a href="{{route('page.list')}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-plus"></i> Manage About Us</a>
            
 <a href="{{route('gallerymanage')}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-plus"></i> gallery</a>
           </p>
     
       </div>
        <div class="col-md-2">
         
        </div>
          </div>
            </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          
                          
                          <th>Name</th>
                          <th>Email</th>
                          
                          
                         
                          <th 
                          >Action</th>
                     
                          
                        </tr>
                      </thead>
                     <tbody>
                        @foreach($contact as $key=>$row)

                      
                        <tr>
                          

                          <td >{{$row->name}}
                        </td>
                       <td >{{$row->email}}
                        </td>
                          
                          

                                                   
                          <td class="td-actions ">
                            
                        <a href="{{route('view.details',$row->id)}}" type="button"  rel="tooltip" class="btn btn-success" >
                              <i class="material-icons">visibility</i>
                            </button>

                        <a type="button" rel="tooltip" class="btn btn-danger" href="{{route('contact.delete',$row->id)}}" >
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
              {{$contact->links()}}
            </div>
            
          </div>
        </div>
      </div>

      @endsection