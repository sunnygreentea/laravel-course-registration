@extends('layouts.front')

@section('content')
	<!-- Page info -->
	<div class="page-info-section set-bg" data-setbg="{{asset('/img/page-bg/2.jpg') }}">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="{{route('front.home')}}">Home</a>
				<span>{{$course->title}}</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->

	@include('front._partials.searchform', ['categories'=>$categories, 'page'=>'other'])

	<!-- single course section -->
	<section class="single-course spad pb-0">
		<div class="container">
			<div class="course-meta-area">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						@if ($course->is_featured==1
						)<div class="course-note">Featured Course</div>
						@endif
						<h3>{{$course->title}}</h3>
						<div class="course-metas">
							<div class="course-meta">
								<div class="course-author">
									<div class="ca-pic set-bg" data-setbg="{{asset('img/authors/'.$course->teacher->id.'.jpg') }}"></div>
									<h6>Teacher</h6>
									<p>{{$course->teacher->name}}</p>
								</div>
							</div>
							<div class="course-meta">
								<div class="cm-info">
									<h6>Category</h6>
									<p>{{$course->category->name}}</p>
								</div>
							</div>
							<div class="course-meta">
								<div class="cm-info">
									<h6>Students</h6>
									<p>{{$course->students->count()}} Students</p>
								</div>
							</div>
							<div class="course-meta">
								<div class="cm-info">
									<h6>Room</h6>
									<p>{{$course->room->name}}</p>
								</div>
							</div>
							<div class="course-meta">
								<div class="cm-info">
									<h6>Schedule</h6>
									<p>{{$course->day}} {{$course->time}}</p>
								</div>
							</div>
						</div>
						@if ($is_registered)
						<a href="{{route('user.mycourses.unregister', $course->id)}}" class="site-btn price-btn">Remove from my courses</a>
						@else
						<a href="{{route('user.mycourses.register', $course->id)}}" class="site-btn buy-btn">Register this course</a>
						@endif
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<h4 class="mt-5">Course Description</h4>
				</div>
				<div class="col-12 col-md-6">
					<img src="{{ asset('/img/courses/'.$course->id.'.jpg') }}" alt="" class="course-preview">
				</div>
				<div class="col-12 col-md-6">
					<div class="cl-item">
						<p>{{$course->description}}</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- single course section end -->

	<!-- related courses -->
	@if($relatedCourses)
	<section class="realated-courses spad">
		<div class="course-warp">
			<h2 class="rc-title">Realated Courses</h2>
			<div class="row course-items-area">
				<!-- course -->
				@include('front.courses._partials.course', ['courses'=>$relatedCourses, 'registeredCourses'=>$registeredCourses])
				
			</div>
		</div>
	</section>
	@endif
	<!-- related courses end -->

@endsection('content')