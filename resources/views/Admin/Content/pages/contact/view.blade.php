@extends('layouts.app', ['activePage' => 'store_information', 'titlePage' => __('Manage Contact Page')])

@section('content')


<div class="content">
  <div class="container-fluid">
    <div class="row">
         <div class="col-md-12">
        <div class="card">
        <div class="card-header card-header-primary">
            <div class="row">
            <div class="col-md-10">
            <h4 class="card-title ">View Contacts</h4>
            </div>
        <div class="col-md-2">
          <a type="button" class="btn btn-success" href="{{route('contact.index')}}">Back</a>
        </div>
          </div>
      </div>
            

<div class="card pd-20 pd-sm-40 ">
         <strong> <h6 style="padding: 20px 0 20px 10px; " class="card-body-title">Team Details</h6> </strong>
          <br>
<form method="post" action="" >
    @csrf()
          <div class="row">
  
    <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong> Name </strong> <span class="tx-danger">*</span></label>
                <input name="name" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="text" value="{{$viewdetail->name}}" >
                
              </div><!-- form-group -->
            </div><!-- col -->


             <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong> Email </strong> <span class="tx-danger">*</span></label>
                <input name="email" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="text" value="{{$viewdetail->email}}" >
                
              </div><!-- form-group -->
            </div><!-- col -->


<div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong> subject </strong> <span class="tx-danger">*</span></label>
                <input name="subject" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="text" value="{{$viewdetail->subject}}" >
                
              </div><!-- form-group -->
            </div><!-- col -->

     <div class="col-sm-12
           ">
              <div class="form-group ">
             <strong> <label style="padding: 20px 0 0px 10px;" class="form-control-label"><strong>Details </strong> </label></strong>
              <br>
              <br>
               <textarea type="text" name="desc"  class="form-control" id="editornepali"  >
                {!$viewdetail->desc!}
               </textarea>
              </div><!-- form-group -->
            </div><!-- col -->

      



  


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