@extends('layouts.app', ['activePage' => 'product', 'titlePage' => __('Manage Product')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="row">
            <div class="col-md-10">
            <h4 class="card-title ">Product Table</h4>
            <p class="card-category"> Best Image Size 1000*800 pixel(width 1000 & height 800 )</p>
          </div>
        <div class="col-md-2">
          <a type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Product </a>
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
                  <th>
                    Product Name
                  </th>
                  <th>
                    Category
                  </th>
                  <th>
                    Price
                  </th>
                  <th>
                    Image
                  </th>
                  
                  <th>
                  Status
                  </th>
                  <th>
                    Action
                  </th>
                </thead>
                <tbody>
         @foreach($products as $key=>$row)
                  <tr>
                    <td>
                      {{$key+1}}
                    </td>
                    <td>
                      {{$row->product_name}}
                    </td>
                    <td>
                      {{$row->category_name}}
                    </td>
                    <td>
                      {{$row->product_price}}
                    </td>
                     <td>
                 <img class="mask flex-center waves-effect waves-light" src="{{asset('images/products/'.$row->product_image)}}" width="100px;">
                  </td>     

                  
                    <td>
              @if($row->status == 1) 
              <span class="badge badge-success"> Active</span>
              @else 
              <span class="badge badge-danger">Inactive</span> 
              @endif      
                    </td>
                    
                      <td style="margin-left: 0 ">

                    <a class="btn btn-outline-danger btn-sm" href="{{route('ProductDelete',$row->id)}}">Delete</a> 
                      
                    <a data-toggle="modal" class="btn btn-outline-primary btn-sm " href="#editproduct-{{$row->id}}">Edit</a>

          @if($row->status == 1) 
            <a class="btn btn-danger btn-sm" href="{{route('product.inactive',$row->id)}}"><i class="fa fa-thumbs-down"></i></a>   
              @else 
              <a class="btn btn-info btn-sm" href="{{route('product.active',$row->id)}}"><i class="fa fa-thumbs-up"></i></a>
              @endif             
                    </td>
                    
                  </tr>
                     @endforeach 
                </tbody>
              </table>
            </div>
          </div>

        </div>
        {{$products->links()}}
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
          <form action="{{route('PostAddProduct')}}" method="post" enctype="multipart/form-data">
            @csrf()
            <div class="form-group">
              <label for="recipient-name" class="control-label">Product Name:</label>
              <input type="text" class="form-control" id="recipient-name" name="product_name">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">category:</label>
               <select  name="category_id"  class="form-control" id="recipient-name">
                     <option>Choose category</option>
                   @foreach($category1 as $abc)

                  
                    <option value="{{$abc->id}}">{{$abc->category_name}}</option>
                    @endforeach
                  </select>
                 
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label" class="img img--outline-primary">Image:</label>
              <input type="file" class="form-control" id="recipient-name" name="product_image" style="opacity: 1; z-index: 1;">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Price:</label>
              <input type="text" class="form-control" id="recipient-name" name="product_price">
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
@foreach($products as $row1)
<div class="bd-example">
  
  <div class="modal fade" id="editproduct-{{$row1->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <form action="{{route('PostEditProduct',$row1->id)}}" method="post" enctype="multipart/form-data">
            @csrf()
            <div class="form-group">
              <label for="recipient-name" class="control-label">Product Name:</label>
              <input type="text" class="form-control" id="recipient-name" name="product_name" value="{{$row1->product_name}}">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">category:</label>
               <select  name="category_id"  class="form-control" id="recipient-name" value="$row1->category_id">
                    
                   @foreach($category1 as $abc)

<option>Choose category</option>
<option value="{{$abc->id}}" <?php if($abc->id==$row1->category_id){echo 'selected';   }     



                      ?>>{{$abc->category_name}}</option>
                    @endforeach
                  </select>
                 
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label" class="img img--outline-primary">Image:</label>
              <input type="file" class="form-control" id="recipient-name" name="product_image" style="opacity: 1; z-index: 1;" >
              <br/>
              <img src="{{asset('images/'.$row1->product_image)}}" width="100">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Price:</label>
              <input type="text" class="form-control" id="recipient-name" name="product_price" value="{{$row1->product_price}}">
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

