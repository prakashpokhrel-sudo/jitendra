@extends('layouts.app', ['activePage' => 'pages', 'titlePage' => __('Manage Blog')])

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
          <a type="button" class="btn btn-success" href="{{route('page.list')}}">All Post</a>
        </div>
          </div>
      </div>
            

<div class="card pd-20 pd-sm-40 ">
         <strong> <h6 style="padding: 20px 0 20px 10px; " class="card-body-title">Edir Pages</h6> </strong>
          <br>
<form method="post" action="{{route('update.page.list',$pagedit->id)}}" enctype="multipart/form-data">
    @csrf()
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong>Title </strong> <span class="tx-danger">*</span></label>
                <input name="title" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="text" value="{{$pagedit->title}}">
                
              </div><!-- form-group -->
            </div><!-- col -->
           
            

          
             <div class="col-sm-12
           ">
              <div class="form-group ">
             <strong> <label style="padding: 20px 0 0px 10px;" class="form-control-label"><strong>Details </strong> </label></strong>
              <br>
              <br>
               <textarea type="text" name="description"  class="form-control" id="editornepali"  >
                {!! $pagedit->description !!}
               </textarea>
              </div><!-- form-group -->
            </div><!-- col -->
                   
  <div class="col-lg-12">
                <div class="form-group">
                  <label style="padding: 0px 0 0px 10px;" class="form-control-label">Image ( Main Thumbnali): <span class="tx-danger">*</span></label>
                 <label class="custom-file">
          <input type="file" id="file" class="custom-file-input" name="page_image" onchange="readURL(this);" required="">
          <span class="custom-file-control"></span>
          <img style="padding: 0px 0 100px 10px;" width="300px;"  src="{{asset('images/pages/'.$pagedit->page_image)}}" id="one" style="center">
            </label>

                </div>
              </div><!-- col-4 -->

            
                    
                    

  <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-50">Submit</button>
                
        </div>


        </div><!-- card -->

            </div>


        </div>
       </div>
        </form>





<script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>

<script>
        ClassicEditor
            .create( document.querySelector( '#editorenglish' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

<script>
        ClassicEditor
            .create( document.querySelector( '#editornepali' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

<script type="text/javascript">
  function readURL(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#one')
        .attr('src', e.target.result)
        .width(250)
        .height(250);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>




@endsection