@extends('layouts.front')

@section('content')
	
	
	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="{{asset('/img/bg.jpg') }}">
		<div class="container">
			<div class="hero-text text-white">
				<h2>Get The Best Courses</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla <br> dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
			</div>
		</div>
		@include('front._partials.searchform', ['categories'=>$categories, 'page'=>'home'])

	</section>
	<!-- Hero section end -->



	<!-- categories section -->
	<section class="categories-section spad">
		<div class="container">
			<div class="section-title">
				<h2>Our Course Categories</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
			</div>
			<div class="row">
				<!-- categories -->
				@foreach ($categories as $category)
				<div class="col-lg-4 col-md-6">
					<div class="categorie-item">
						<div class="ci-thumb set-bg" data-setbg="{{ asset('img/categories/'.$category->id.'.jpg')}}"></div>
						<div class="ci-text">
							<h5>{{$category->name}}</h5>
							<p>{!! Str::limit($category->description, $limit = 50, $end = '.......') !!}</p>
							<span>{{$category->courses->count() }} courses</span>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- categories section end -->	

	<!-- course section -->
	<section class="course-section spad">
		<div class="container">
			<div class="section-title mb-0">
				<h2>Featured Courses</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
			</div>
		</div>
		<div class="course-warp">
			<ul class="course-filter controls">
				<li class="control active" data-filter="all">All</li>
				@foreach ($categories as $category)
				<li class="control" data-filter=".{{$category->name}}">{{$category->name}}</li>
				@endforeach
				
			</ul>                                       
			<div class="row course-items-area">
				@include('front.courses._partials.course', ['courses'=>$courses,  'registeredCourses'=>$registeredCourses])
			</div>
		</div>
	</section>
	<!-- course section end -->



@endsection

	