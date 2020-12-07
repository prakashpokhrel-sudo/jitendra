@extends('layouts.app', ['activePage' => 'blog_category', 'titlePage' => __('Manage Category')])

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
          <a type="button" class="btn btn-success" data-toggle="modal" data-target="#AddBlog" data-whatever="@mdo">Add Product </a>
        </div>
          </div>
            </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th >ID</th>
                          <th >Category Name English</th>
                          <th  >Category Name Nepali</th>
                          <th 
                          >Action</th>
                     
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($blog as $key=>$row)
                        <tr>
                          <td  >{{$key+1}}</td>
                          <td style="padding:0 0 0 15px" >{{$row->category_name_en}}</td>
                          <td style="padding:0 0 0 15px"  >{{$row->category_name_np}}</td>
                                                   
                          <td class="td-actions ">
                            
                            <a href="#EditBlogcategory{{$row->id}}" type="button" data-toggle="modal" rel="tooltip" class="btn btn-success" >
                              <i class="material-icons">edit</i>
                            </button>

                           <a type="button" rel="tooltip" class="btn btn-danger" href="{{route('blog.delete',$row->id)}}" >
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
              {{$blog->links()}}
            </div>
            
          </div>
        </div>
      </div>


<!-- AddBlogcategory -->

<div class="bd-example">
  
  <div class="modal fade" id="AddBlog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
          
        </div>
       
  <form action="{{route('store.blog')}}" method="post">
  @csrf()
      <div class="modal-body pd-50">
  <div class="form-group">
    <label style="padding-bottom: 20px" class="control-label">Category Name English</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="category_name_en" style="padding-top: 10px " required="">
    
  </div>
 


 <div class="form-group">
    <label style="padding-bottom: 20px" class="control-label">Category Name Nepali</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="category_name_np" style="padding-top: 10px " required="">
    
  </div>
     
        <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-50">Submit</button>
                <button type="button" class="btn btn-danger pd-x-20" data-dismiss="modal">Close</button>
        </div>
      </div>
  </form>
    </div>
  </div>
</div>

<!-- EditBlogcategory -->
@foreach($blog as $key=>$row1)
<div class="bd-example">
  
  <div class="modal fade" id="EditBlogcategory{{$row1->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
          
        </div>
       
  <form action="{{route('edit.blog',$row1->id)}}" method="post">
  @csrf()
      <div class="modal-body pd-50">
  <div class="form-group">
    <label style="padding-bottom: 20px" class="control-label">Category Name English</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="category_name_en" style="padding-top: 10px " required=" " value="{{$row1->category_name_en}}">
    
  </div>
 


 <div class="form-group">
    <label style="padding-bottom: 20px" class="control-label">Category Name Nepali</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="category_name_np" style="padding-top: 10px " required="" value="{{$row1->category_name_np}}">
    
  </div>
     
        <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-50">Submit</button>
                <button type="button" class="btn btn-danger pd-x-20" data-dismiss="modal">Close</button>
        </div>
      </div>
  </form>
    </div>
  </div>
</div>
@endforeach

@endsection