<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\User;
use App\Category;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    public function index()
    {
    
    	abort_if(Gate::denies('course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$user = auth()->user();
    	
        // Get all my courses
    	if(auth()->user()->is_teacher) {
            $courses = Course::where('teacher_id', auth()->user()->id)->get();
        }
        if(auth()->user()->is_student) {
        	$courses = auth()->user()->courses;
        }
        return view('user.home', compact('courses', 'user'));
    }


    public function show($id)
    {
    	abort_if(Gate::denies('course_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    	// For students: Show same course detail page for front and students
    	if(auth()->user()->is_student) {
        	return redirect()->route('front.courses.show', $id);
        }

        // For teachers: Show a different course detail page
        if(auth()->user()->is_teacher) {
            $user = auth()->user();
            $course = Course::find($id);
            return view('user.course', compact('course', 'user'));
        }
    }

    

    public function register ($id, Request $request)
    {
        abort_if(Gate::denies('course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    	// Check if this course is already registered
        if(auth()->user()->is_student) {
            $registeredCourses = auth()->user()->courses()->pluck('courses.id')->toArray();

            // Already registered
            if(in_array($id, $registeredCourses)) {
                $message = 'This course is already registered!';
            }
            else {
                auth()->user()->courses()->attach($id);
                $message = 'This course is registered successfully';
            }
            $request->session()->flash('success', $message);
            return redirect()->route('user.home');
        }
        
    }

    public function unregister ($id, Request $request)
    {
        abort_if(Gate::denies('course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if(auth()->user()->is_student) {
            $registeredCourses = auth()->user()->courses()->pluck('courses.id')->toArray();
             if(in_array($id, $registeredCourses)) {
                auth()->user()->courses()->detach($id);
                $message = 'This course is removed successfully';
            }
            $request->session()->flash('success', $message);
            return redirect()->route('user.home');
        }
        
        return redirect()->route('user.home');

    }
}
