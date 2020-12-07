@extends('layouts.app', ['activePage' => 'store_information', 'titlePage' => __('Manage Shop Setting')])

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
         <strong> <h6 style="padding: 20px 0 20px 10px; " class="card-body-title">Shop Setting</h6> </strong>
          <br>
<form method="post" action="{{route('update.store.information')}}" >
    @csrf()
          <div class="row">
   <input type="hidden" name="id" value="{{$setting->id}}"> 
    <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong>Phone One </strong> <span class="tx-danger">*</span></label>
                <input name="phone_one" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="text" value="{{$setting->phone_one}}">
                
              </div><!-- form-group -->
            </div><!-- col -->

    <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong>Phone Two </strong> <span class="tx-danger">*</span></label>
                <input name="phone_two" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="text" value="{{$setting->phone_two}}">
                
              </div><!-- form-group -->
            </div><!-- col -->

          <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong>Email </strong> <span class="tx-danger">*</span></label>
                <input name="email" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="email" value="{{$setting->email}}">
                
              </div><!-- form-group -->
            </div><!-- col -->

          <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong>Company Name </strong> <span class="tx-danger">*</span></label>
                <input name="company_name" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="text" value="{{$setting->company_name}}">
                
              </div><!-- form-group -->
            </div><!-- col -->

        <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong>Company Address </strong> <span class="tx-danger">*</span></label>
                <input name="company_address" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="text" value="{{$setting->company_address}}">
                
              </div><!-- form-group -->
            </div><!-- col -->

          <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong>facebook </strong> <span class="tx-danger">*</span></label>
                <input name="facebook" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="text" value="{{$setting->facebook}}">
                
              </div><!-- form-group -->
            </div><!-- col -->

            <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong>Youtube </strong> <span class="tx-danger">*</span></label>
                <input name="youtube" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="text" value="{{$setting->youtube}}">
                
              </div><!-- form-group -->
            </div><!-- col -->

                <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong>Instagram </strong> <span class="tx-danger">*</span></label>
                <input name="instagram" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="text" value="{{$setting->instagram}}">
                
              </div><!-- form-group -->
            </div><!-- col -->

         <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong>Twitter </strong> <span class="tx-danger">*</span></label>
                <input name="twitter" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="text" value="{{$setting->twitter}}">
                
              </div><!-- form-group -->
            </div><!-- col -->

            <div class="col-lg-6">
              <div class="form-group ">
                 <label style="padding: 0px 0 0px 10px;" class="form-control-label"><strong>Title </strong> <span class="tx-danger">*</span></label>
                <input name="title" style="padding: 0px 0 0px 10px;"  class="form-control " placeholder="Enter The Title " type="text" value="{{$setting->title}}">
                
              </div><!-- form-group -->
            </div><!-- col -->                    

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