@extends('layouts.front')

@section('content')
	<!-- Page info -->
	<div class="page-info-section set-bg" data-setbg="{{asset('/img/page-bg/2.jpg') }}">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="{{route('front.home')}}">Home</a>
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
				<h2>Our Courses</h2>
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

			<!-- featured course -->
			@if($feaCourses)
			<div class="featured-courses">
				@foreach ($feaCourses as $course)
				<div class="featured-course course-item">
					<div class="course-thumb set-bg" data-setbg="{{ asset('img/courses/f-'.$course->id.'.jpg') }}">
						@if(in_array($course->id, $registeredCourses)) <div class="price">Registered</div> @endif
					</div>
					<div class="row">
						<div class="col-lg-6 offset-lg-6 pl-0">
							<div class="course-info">
								<div class="course-text">
									<div class="fet-note">Featured Course</div>
									<h5><a href="{{route('front.courses.show', $course->id)}}">{{$course->title}}</a></h5>
									<p> {!! Str::limit($course->description, $limit = 200, $end = '.......') !!}</p>
									<p><a href="{{route('front.courses.show', $course->id)}}">Detail</a></p>
									<div class="students">{{$course->students->count()}} Students</div>
								</div>
								

								<div class="course-author">
									<div class="ca-pic set-bg" data-setbg="{{ asset('img/authors/'.$course->teacher->id.'.jpg') }}"></div>
									<p>Teacher: <span>{{$course->teacher->name}}</span></p>
							</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			@endif
		</div>
	</section>
	<!-- course section end -->


@endsection('content')