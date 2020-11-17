@extends('layouts.front')
@section('content')

    <!-- Page info -->
    <div class="page-info-section set-bg" data-setbg="{{asset('/img/page-bg/2.jpg') }}">
        <div class="container">
            <div class="site-breadcrumb">
                <a href="{{route('front.home')}}">Home</a>
                <span>My Courses</span>
            </div>
        </div>
    </div>
    <!-- Page info end -->

    <section class="mycourses-section spad">
        <div class="container">
            <div class="section-title mb-0">
                <h2>My Courses</h2>
            </div>
            <div class="mycourses-warp">
                @if ($courses->count()>0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Course</th>
                            <th scope="col">Room</th>
                            <th scope="col">Schedule</th>
                            <th scope="col">Teacher</th>
                            <th scope="col">Students</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->title}}</td>
                            <td>{{$course->room->name}}</td>
                            <td>{{$course->day}} : {{$course->time}}</td>
                            <td>{{$course->teacher->name}}</td>
                            <td>{{$course->students->count()}}</td>
                            <td>
                                <a href="{{route('user.mycourses.show', $course->id)}}" class="btn btn-danger">Detail</a>
                                @if ($user->is_student)
                                <a href="{{route('user.mycourses.unregister', $course->id)}}" class="btn btn-danger">Remove</a>
                                @endif
                            </td>
                        </tr>
                         @endforeach
                    </tbody>
                </table>
               @else
               <p>There is no registered courses for you.</p>
               @endif
            </div>
        </div>
    </section>
@endsection
@section('scripts')
@parent

@endsection
