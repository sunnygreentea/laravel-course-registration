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
						
					</div>
				</div>
			</div>

			@if ($course->students)
			<div class="row">
				<div class="col-12">
					<h4 class="mt-5">Students</h4>
				</div>
					@foreach ($course->students as $student)
					<div class="col-3">
						<p>{{$student->name}}</p>
					</div>
					@endforeach
			</div>
			@endif

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

@endsection
@section('scripts')
@parent

@endsection
