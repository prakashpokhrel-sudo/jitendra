@php

$setting=DB::table('sitesetting')->first();


$banner=DB::table('sliders')->where('status',1)->orderBy('id','desc')->get();

@endphp

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{route('shop.home')}}">{{$setting->company_name}}</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{route('shop.home')}}" class="nav-link">Home</a></li>
	             <li class="nav-item"><a href="#" class="nav-link">Our Products</a></li>
	          <li class="nav-item"><a href="{{route('aboutus')}}" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="{{route('gallery')}}" class="nav-link">Gallery</a></li>
	         
	          <li class="nav-item"><a href="{{route('blog.post')}}" class="nav-link">Blog</a></li>

	          <li class="nav-item"><a href="{{route('contact.us')}}" class="nav-link">Contact</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language/Blog</a>

@php 

$language = Session()->get('lang');

@endphp


              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	@if(Session()->get('lang') == 'nepali')
              <a class="dropdown-item" href="{{route('language.english')}}">English</a>
              	@else
              <a class="dropdown-item" href="{{route('language.nepali')}}">Nepali</a>
              	@endif
              	
                 
	          </div>
	      </li>
	          
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <section id="home-section" class="hero">
    	
		  <div class="home-slider owl-carousel">
		  	@foreach($banner as $slider)
	      <div class="slider-item" style="background-image: url('{{('images/banner/'.$slider->slider_image)}}');">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2">{{$slider->description1}}</h1>
	              <h2 class="subheading mb-4">{{$slider->description2}}</h2>
	              <p><a href="#" class="btn btn-primary">View Details</a></p>
	            </div>

	          </div>
	        </div>
	      </div>

	        @endforeach
	    </div>
	  
    </section>