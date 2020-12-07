@extends('clientsite.layouts.main')
@section('content')

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
@foreach($posts as $row)
          <div class="col-lg-12 ftco-animate" style="margin:0 0 150px 0  ">


      <h2 class="mb-3" style="color: blue;" >

 @if(Session()->get('lang') == 'nepali')
 {{$row-> post_title_np}}
@else
{{$row->post_title_en }}
@endif 


      
        </h2>
          	 <p>
              <img src="{{asset('images/blog/'.$row->post_image)}}" alt="" class="img-fluid" height="200px;" width="60%" style="border-image-width: auto">
            </p>


            <p>
            	
           @if(Session()->get('lang') == 'nepali')
		   {{$row->details_np }}
		    @else
           {{$row->details_en}}
		    @endif 
            </p>
          </div> <!-- .col-md-8 -->
          @endforeach
          
        </div>
      </div>
    </section> <!-- .section -->

    

@endsection