@extends('layouts.app', ['activePage' => 'pages', 'titlePage' => __('Manage Image Gallery')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="row">
            <div class="col-md-10">
            <h4 class="card-title ">Image Gallay</h4>
            <p class="card-category"> 

<a href="{{route('team.list')}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-plus"></i> Manage Team Details</a>
      
<a href="{{route('review.list')}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-plus"></i> Manage Review</a>
            
<a href="{{route('page.list')}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-plus"></i> Manage About Us</a>

 <a href="{{route('contact.index')}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-plus"></i> Contact Page</a></p>

            </p>
          </div>
        <div class="col-md-2">
          <a type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Image  </a>
        </div>
          </div>
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  
                  <th>
                    Image
                  </th>
                  <th>
                    Title
                  </th>
                  <th>
                  Status
                  </th>
                  <th>
                    Action
                  </th>
                </thead>
                <tbody>
         @foreach($gallerymanage as $key=>$row)
                  <tr>
                    
                     <td>
                 <img class="mask flex-center waves-effect waves-light" src="{{asset('images/gallery/'.$row->gallery_image)}}" width="300px;" height="300px;">
                  </td>     
          <td>
            {{$row->title}}
          </td>
                  
                    <td>
              @if($row->status == 1) 
              <span class="badge badge-success"> Active</span>
              @else 
              <span class="badge badge-danger">Inactive</span> 
              @endif      
                    </td>
                    
                      <td style="margin-left: 0 ">

                    <a class="btn btn-outline-danger btn-sm" href="{{route('gallery.image.delete',$row->id)}}">Delete</a> 
                      
                    <a data-toggle="modal" class="btn btn-outline-primary btn-sm " href="#editgallery-{{$row->id}}">Edit</a>

          @if($row->status == 1) 
            <a class="btn btn-danger btn-sm" href="{{route('gallery.inactive',$row->id)}}"><i class="fa fa-thumbs-down"></i></a>   
              @else 
              <a class="btn btn-info btn-sm" href="{{route('gallery.active',$row->id)}}"><i class="fa fa-thumbs-up"></i></a>
              @endif             
                    </td>
                    
                  </tr>
                     @endforeach 
                </tbody>
              </table>
            </div>
          </div>
        </div>
        {{$gallerymanage->links()}}
      </div>
<div class="bd-example">
  
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">New message</h4>
        </div>
        <!-- Add Product -->
        <div class="modal-body">
          <form action="{{route('addgalleryimage')}}" method="post" enctype="multipart/form-data">
            @csrf()
            <div class="form-group">
              <label for="recipient-name" class="control-label">Title:</label>
              <input type="text" class="form-control" id="recipient-name" name="title">
            </div>
           
            <div class="form-group">
              <label for="recipient-name" class="control-label" class="img img--outline-primary">Image:</label>
              <input type="file" class="form-control" id="recipient-name" name="gallery_image" style="opacity: 1; z-index: 1;">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-50">Submit</button>
                <button type="button" class="btn btn-danger pd-x-20" data-dismiss="modal">Close</button>
        </div>

          </form>
        </div>
       
      </div>
    </div>
  </div>
</div>

<!-- edit product -->

<!-- edit product -->
@foreach($gallerymanage as $row1)
<div class="bd-example">
  
  <div class="modal fade" id="editgallery-{{$row1->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">New message</h4>
        </div>
        <!-- Add Product -->
        <div class="modal-body">
          <form action="{{route('gallery.update',$row1->id)}}" method="post" enctype="multipart/form-data">
            @csrf()
            <div class="form-group">
              <label for="recipient-name" class="control-label">Title:</label>
              <input type="text" class="form-control" id="recipient-name" name="title" value="{{$row1->title}}">
            </div>
            
            <div class="form-group">
              <label for="recipient-name" class="control-label" class="img img--outline-primary">Image:</label>
              <input type="file" class="form-control" id="recipient-name" name="gallery_image" style="opacity: 1; z-index: 1;" >
              <br/>
              <img src="{{asset('images/gallery/'.$row1->gallery_image)}}" width="100">
            </div>
            
             <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-50">Submit</button>
                <button type="button" class="btn btn-danger pd-x-20" data-dismiss="modal">Close</button>
        </div>


          </form>
        </div>
       
      </div>
    </div>
  </div>
</div>
@endforeach



@endsection

