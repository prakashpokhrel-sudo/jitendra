@extends('layouts.app', ['activePage' => 'category', 'titlePage' => __('Manage Category')])

@section('content')


<div class="content">

  <div class="container-fluid">
  	@if(Session::has('status'))
           <div class="alert alert-success">
           	{{Session::get('status')}}
           </div>
         @endif

         @if(Session::has('status1'))
        <div class="alert alert-danger">
        	{{Session::get('status1')}}
        </div>

         @endif

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="row">
            <div class="col-md-10">
            <h4 class="card-title ">Category Table</h4>
            
          </div>
        <div class="col-md-2">
          <a type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Category </a>
        </div>
          </div>
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th style="text-align: center;">
                    Category Name
                  </th>
                  
                  <th style="text-align: center">
                    Action
                  </th>
                  
                </thead>
                <tbody>
                	@foreach($category as $key=>$item)
                  <tr>
                    <td>
                     {{$key+1}}
                    </td>
                    
                     <td style="text-align: center ">
                     {{$item->category_name}}
                    </td>
                    
                    <td style="text-align: center">

                    <a class="btn btn-outline-danger btn-sm" href="{{route('delete.category',$item->id)}}">Delete</a> 
                    	
                    <a data-toggle="modal" class="btn btn-outline-primary btn-sm " href="#editcategory-{{$item->id}}">Edit</a> 
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            
            </div>
          </div>

        </div>
        {{$category->links()}}
      </div>

   <!-- Addcategory -->
<div class="bd-example">
  
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
          
        </div>

       

       
          <form action="{{route('store.category')}}" method="post">
	@csrf()
      <div class="modal-body pd-50">
  <div class="form-group">
    <label style="padding-bottom: 20px" class="control-label">Category Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="category_name" style="padding-top: 10px " required="">
    
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

<!-- edit category -->
@foreach($category as $item1)
<div class="bd-example">
  
  <div class="modal fade" id="editcategory-{{$item1->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
          
        </div>
       
          <form action="{{route('edit.category',$item1->id)}}" method="post">
	@csrf()
      <div class="modal-body pd-50">
  <div class="form-group">
    <label style="padding-bottom: 20px" class="control-label">Category Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="category_name" style="padding-top: 10px " value="{{$item1->category_name}}" required="">
    
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