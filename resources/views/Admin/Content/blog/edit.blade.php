@extends('layouts.app', ['activePage' => 'add_blog', 'titlePage' => __('Manage Blog')])

@section('content')

@php 

$postcategory=DB::table('post_category')->get();

@endphp

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
          <a type="button" class="btn btn-success" href="{{route('post.list')}}">All Post</a>
        </div>
          </div>
      </div>
            

<div class="card pd-20 pd-sm-40 ">
         <strong> <h6 style="padding: 20px 0 20px 10px; " class="card-body-title">Post Update</h6> </strong>
          <br>
<form method="post" action="{{route('update.post.list',$post->id)}}" enctype="multipart/form-data">
    @csrf()
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong>Post Title (English)</strong> <span class="tx-danger">*</span></label>
                <input name="post_title_en" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter Post Title (English)" type="text" value="{{$post->post_title_en}}">
                
              </div><!-- form-group -->
            </div><!-- col -->
            <div class="col-lg-6">
              <div class="form-group ">
                <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong> Post Title (Nepali) </strong><span class="tx-danger">*</span></label> </strong>
                <input name="post_title_np" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter Post Title (Nepali)" type="text" value="{{$post->post_title_np}}">
                
              </div><!-- form-group -->
            </div><!-- col -->
            <div class="col-lg-4">
              <div class="form-group ">
                <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong> Blog Category</strong> <span class="tx-danger">*</span></label></strong>

                <select type="text" class="browser-default custom-select" name="category_id" required="" >
                     @foreach($postcategory as $blog)
                    <option selected>Choose category</option>


                   
                   <option value="{{$blog->id}}"

         <?php  if ($blog->id == $post->category_id) 
         {
           
          echo "selected";

            } ?>>

      {{$blog->category_name_en}}</option>
        
        @endforeach
                 
  
                     </select>
                <!-- form-group -->
            </div><!-- col -->
          </div><!-- row -->

          <div class="col-sm-12
           ">
              <div class="form-group ">
             <strong> <label style="padding: 20px 0 0px 10px;" class="form-control-label"><strong>Post Details(English)</strong> </label></strong>
              <br>
              <br>
               <textarea type="text" name="details_en" class="form-control" id="editorenglish"  >
                  {!! $post->details_en !!}

              </textarea>
              </div><!-- form-group -->
            </div><!-- col -->


             <div class="col-sm-12
           ">
              <div class="form-group ">
             <strong> <label style="padding: 20px 0 0px 10px;" class="form-control-label"><strong>Post Details(Nepali)</strong> </label></strong>
              <br>
              <br>
               <textarea type="text" name="details_np"  class="form-control" id="editornepali"  >
                 {!! $post->details_np !!}
               </textarea>
              </div><!-- form-group -->
            </div><!-- col -->
                   
  <div class="col-lg-12">
                <div class="form-group">
                  <label style="padding: 0px 0 0px 10px;" class="form-control-label">Image One ( Main Thumbnali): <span class="tx-danger">*</span></label>
                 <label class="custom-file">
          <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL(this);" required="">
          <span class="custom-file-control"></span>
          <img style="padding: 0px 0 100px 10px;" width="200px;"  src="{{asset('images/blog/'.$post->post_image)}}" id="one" style="center">
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