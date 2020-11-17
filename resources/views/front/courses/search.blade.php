@extends('layouts.front')

@section('content')
	<!-- Page info -->
	<div class="page-info-section set-bg" data-setbg="{{asset('/img/page-bg/2.jpg') }}">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="/">Home</a>
				<span>Courses</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->

	@include('front._partials.searchform', ['categories'=>$categories, 'page'=>'other'])

	<!-- course section -->
	<section class="course-section spad">
		<div class="container">
			<div class="section-title mb-0">
				<h2>Search Courses</h2>
			</div>
		</div>
		<div class="course-warp">
			                                 
			<div class="row course-items-area">
				@include('front.courses._partials.course', ['courses'=>$courses,  'registeredCourses'=>$registeredCourses])
			</div>

			
		</div>
	</section>
	<!-- course section end -->


@endsection('content')