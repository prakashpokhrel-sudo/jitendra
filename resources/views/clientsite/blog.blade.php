@extends('clientsite.layouts.main')
@section('content')

@php 

 $post = DB::table('posts')->get();

@endphp

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 ftco-animate">
						<div class="row">

					@foreach($post as $row)
							<div class="col-md-12 d-flex ftco-animate">

		            <div class="blog-entry align-self-stretch d-md-flex">
		              <a href="blog-single.html" class="block-20" style="background-image: url('{{asset('images/blog/'.$row->post_image)}}');">
		              </a>
		              <div class="text d-block pl-md-4">
		              	<div class="meta mb-3">
		                  <div><a href="#">July 20, 2019</a></div>
		                  <div><a href="#">Admin</a></div>
		                  
		                </div>
		                <h3 class="heading"><a href="#">
		       @if(Session()->get('lang') == 'nepali')
		       {{$row->post_title_np}}
		       @else
              {{$row->post_title_en}}
		       @endif         	

		            </a></h3>
		                
		                <p><a href="{{route('blog.single',$row->id)}}" class="btn btn-primary py-2 px-3">
              @if(Session()->get('lang') == 'nepali')
		            
                थप पढ्नुहोस्
		       @else
                  Read more
		       @endif
		   </a></p>
		              </div>
		            </div>
		          </div>
		          @endforeach
		          
		         
		       </div>
          </div> <!-- .col-md-8 -->

        </div>
      </div>
    </section> <!-- .section -->

    

   
@endsection