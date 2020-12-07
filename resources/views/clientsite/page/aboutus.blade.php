@extends('clientsite.layouts.main')
@section('content')

<link rel="stylesheet" type="text/css" href="Frontend/css/team.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
@php

$page=DB::table('pages')->limit(1)->get();
$team=DB::table('teams')->get();
@endphp
    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
			<div class="container">
				@foreach($page as $row)
				<div class="row">
					
					<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url('{{asset('images/pages/'.$row->page_image)}}');">
						
					</div>
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
	          <div class="heading-section-bold mb-4 mt-md-5">
	          	<div class="ml-md-0">
		            <h2 class="mb-4">{{$row->title}}</h2>
	            </div>
	          </div>
	          <div class="pb-md-5">
	          	<p>{!!$row->description!!}</p>
							<p><a href="#" class="btn btn-primary">Shop now</a></p>
						</div>
					</div>
					
				</div>
				@endforeach
			</div>
		</section>

	
		
		<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_3.jpg);">
    	<div class="container">
    		<div class="row justify-content-center py-5">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="10000">0</strong>
		                <span>Happy Customers</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="100">0</strong>
		                <span>Branches</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="1000">0</strong>
		                <span>Partner</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="100">0</strong>
		                <span>Awards</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>




<body>
  <section class="members">
    <div class="container">
    	<div class="row heading">
    <div class="col-md-12 col-md-offset-3">
      <h2 class="text-center " style="padding: 0 0 50px 0px;
      margin: 0 0 0 00px" >Meet Our Team</h2>
      
    </div>
  </div>
      <div class="row">


        
      @foreach($team as $row)
        <div class="col-md-6 col-lg-4">
          <div class="card text-center member">
            <img class="card-img-top" src="{{asset('images/teams/'.$row->team_image)}}" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">{{$row->name}}</h4>
              <p class="card-text">{{$row->desc}}</p>
              <ul class="list-inline">
                <li class="list-inline-item"><a href="https://www.facebook.com/ProgMohamedN" target="_blank" class="fa fa-facebook"></a></li>
                <li class="list-inline-item"><a href="https://www.linkedin.com/in/mohamed-nady-b83613129/" target="_blank" class="fa fa-linkedin"></a></li>
                <li class="list-inline-item"><a href="" target="_blank" class="fa fa-twitter"></a></li>
                <li class="list-inline-item"><a href="" target="_blank" class="fa fa-google-plus"></a></li>
              </ul>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
</body>


		


    <section class="ftco-section bg-light">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Free Shipping</h3>
                <span>On order over $100</span>
              </div>
            </div>      
          </div>
          <div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-diet"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Always Fresh</h3>
                <span>Product well package</span>
              </div>
            </div>    
          </div>
          <div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-award"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Superior Quality</h3>
                <span>Quality Products</span>
              </div>
            </div>      
          </div>
          <div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Support</h3>
                <span>24/7 Support</span>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>

    

@endsection