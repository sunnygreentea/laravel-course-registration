<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\User;
use App\Category;

class CoursesController extends Controller
{
    public function index()
    {
        // Categories
    	$categories = Category::all();

    	// All Courses
        $courses = Course::paginate(10);

        // Featured courses
        $feaCourses = Course::where('is_featured', 1)->take(2)->get();

        // Registered courses for students
        $registeredCourses = array();
        if(auth()->user()) {
            if(auth()->user()->is_student) {
                $registeredCourses = auth()->user()->courses()->pluck('courses.id')->toArray();
            }
        }


        return view('front.courses.index', compact('categories', 'courses','feaCourses', 'registeredCourses'));
    }

    public function show ($id)
    {
        // Categories
        $categories = Category::all();
    	$course = Course::where('id', $id)->first();
    	
        // Related courses, in the same category
    	$relatedCourses = Course::where('category_id', $course->category->id)->get();
        
        // Registered courses for students
        $registeredCourses = array();
        $is_registered = false;
        if(auth()->user()) {
            if(auth()->user()->is_student) {
                $registeredCourses = auth()->user()->courses()->pluck('courses.id')->toArray();
                $is_registered = in_array($id, $registeredCourses) ? true : false;
            }
        }

    	return view('front.courses.show', compact('categories', 'course', 'relatedCourses', 'is_registered', 'registeredCourses'));
    }

    public function search (Request $request) {

        $courses = Course::
        when(request('title'), function($query) {
            return $query->where('courses.title', 'like', '%' . request('title') . '%');
            })
        ->when(request('category')>0, function($query) {
            return $query->where('courses.category_id', request('category'));
            })
       
        ->paginate(10);
        
        $courses->appends(request()->except('_token'))->links();
       
       // Registered courses for students
        $registeredCourses = array();
        if(auth()->user()) {
            if(auth()->user()->is_student) {
                $registeredCourses = auth()->user()->courses()->pluck('courses.id')->toArray();
            }
        }

        // Categories
        $categories = Category::all();
        
        // Featured courses
        $feaCourses = false;

        return view('front.courses.search', compact('categories', 'courses','feaCourses', 'registeredCourses'));


    }
}
