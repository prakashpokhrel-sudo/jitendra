@extends('layouts.app', ['activePage' => 'store_information', 'titlePage' => __('Manage Team Page')])

@section('content')


<div class="content">
  <div class="container-fluid">
    <div class="row">
         <div class="col-md-12">
        <div class="card">
        <div class="card-header card-header-primary">
            <div class="row">
            <div class="col-md-10">
            <h4 class="card-title ">Edit Team Page</h4>
           
          </div>
        <div class="col-md-2">
          <a type="button" class="btn btn-success" href="{{route('team.list')}}">Team Manage</a>
        </div>
          </div>
      </div>
            

<div class="card pd-20 pd-sm-40 ">
         <strong> <h6 style="padding: 20px 0 20px 10px; " class="card-body-title">Team Details</h6> </strong>
          <br>
<form method="post" action="{{route('update.team.list',$teammanage->id)}}" enctype="multipart/form-data">
    @csrf()
          <div class="row">
   
    <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong> Name </strong> <span class="tx-danger">*</span></label>
                <input name="name" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="text" value="{{$teammanage->name}}">
                
              </div><!-- form-group -->
            </div><!-- col -->

    <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong>Phone Number </strong> <span class="tx-danger">*</span></label>
                <input name="phone_no" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="text" value="{{$teammanage->phone_no}}">
                
              </div><!-- form-group -->
            </div><!-- col -->

          

          <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong>Personal Info </strong> <span class="tx-danger">*</span></label>
                <input name="desc" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="text" value="{{$teammanage->desc}}">
                
              </div><!-- form-group -->
            </div><!-- col -->

      
          <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong>facebook </strong> <span class="tx-danger">*</span></label>
                <input name="facebook" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="text" value="{{$teammanage->facebook}}">
                
              </div><!-- form-group -->
            </div><!-- col -->

            <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong>Youtube </strong> <span class="tx-danger">*</span></label>
                <input name="youtube" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="text" value="{{$teammanage->youtube}}">
                
              </div><!-- form-group -->
            </div><!-- col -->

                <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong>Instagram </strong> <span class="tx-danger">*</span></label>
                <input name="instagram" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="text" value="{{$teammanage->instagram}}">
                
              </div><!-- form-group -->
            </div><!-- col -->

         <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong>Twitter </strong> <span class="tx-danger">*</span></label>
                <input name="twitter" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="text" value="{{$teammanage->twitter}}">
                
              </div><!-- form-group -->
            </div><!-- col -->

               

             <div class="col-lg-12">
                <div class="form-group">
                  <label style="padding: 0px 0 0px 10px;" class="form-control-label">Image ( Main Thumbnali): <span class="tx-danger">*</span></label>
                 <label class="custom-file">
          <input type="file" id="file" class="custom-file-input" name="team_image" onchange="readURL(this);" >
          <span class="custom-file-control"></span>
          <img style="padding: 0px 0 100px 10px;" width="300px;" height="300px;"  src="{{asset('images/teams/'.$teammanage->team_image)}}" id="one" style="center" name="page_image" onchange="readURL(this);">
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