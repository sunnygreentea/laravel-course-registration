<!-- course -->
@foreach ($courses as $course)
<div class="mix col-lg-3 col-md-4 col-sm-6 {{$course->category->name}}">
	<div class="course-item">
		<div class="course-thumb set-bg" data-setbg="{{ asset('img/courses/'.$course->id.'.jpg') }}">
			@if(in_array($course->id, $registeredCourses))<div class="price"> Registered</div> @endif
		</div>
		<div class="course-info">
			<div class="course-text">
				<h5><a href="{{route('front.courses.show', $course->id)}}">{{$course->title}}</a></h5>
				<p> {!! Str::limit($course->description, $limit = 70, $end = '.......') !!}</p>
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
@endforeach